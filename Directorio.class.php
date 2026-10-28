<?php

/**
 * Implementa la interfaz con el directorio del AD de la Municipalidad.
 *  
 * @package interfaces
 */
class Directorio 
{
	private  $server; 
	private  $port; 
	private  $ldapUser;
	private  $ldapPasswd;
	private  $baseUsr; 

	private  $conn; 

	/**
	 * Construye un nuevo objeto Directorio. Saca los parámetros de configuración
	 * de la base de datos, usando la clase Config. 
	 * 
	 * @return Directorio
	 */
	public function __construct()
	{
		
		$this->server     = '10.100.16.16';
		$this->port       = '389';
		$this->ldapUser   = 'MVL\svs_LDAPFWK1';
		$this->ldapPasswd = 'bfi7fl1jp1y54ie4td61di3b4ipsqfn2';
		//$this->baseUsr    = 'OU=Usuarios-Sincro,OU=Palacio,OU=Hacienda,OU=Usuarios y Workstations,OU=MVL,DC=vicentelopez,DC=gov,DC=ar';
		$this->baseUsr    = 'OU=Usuarios y Workstations,OU=MVL,DC=vicentelopez,DC=gov,DC=ar';
	}

	/**
	 * Devuelve un array uni-dimensional con la lista de atributos de la entrada. Sólo maneja el caso de atributos
	 * que tengan un único valor. La gran diferencia con ldap_get_attributes() es que esta última maneja atributos
	 * con múltiples valores, por lo que devuelve un array que es multidimensional, que es más engorroso de manejar.
	 * Siempre agrega un atributo "dn" (esté o no como atributo de la entrada).  
	 * 
	 * @param resource $entry
	 * @return array El array de los atributos o NULL si $entry es inválida
	 */
	protected function getAttributes ($entry)
	{
		if (!$entry)
			return null; 
			
		$attrs = ldap_get_attributes($this->conn, $entry);
		$count = $attrs['count'];
		$ret = array();

		for ($i = 0 ; $i < $count ; $i++)
		{
			$key = $attrs[$i];
			$value = $attrs[$key][0];	// me quedo con el primer resultado, aunque hubiera muchos...
			$ret[$key] = $value;
		}
		
		$ret['dn'] = ldap_get_dn($this->conn, $entry);
		return $ret; 		
	}
	
	/**
	 * Busca un usuario en el directorio y devuelve sus atributos. 
	 * Si se encontrara más de una entrada (no debería ser buscando por atributo UID), sólo
	 * devuelve la primera.
	 *  
	 * @param $uid nombre.apellido
	 * @return array Datos del usuario o NULL si no lo encontró. 
	 */
	public function findUser($uid)
	{
	    
	    
	    ldap_set_option($this->conn, LDAP_OPT_REFERRALS, 0);
	    ldap_set_option($this->conn, LDAP_OPT_PROTOCOL_VERSION, 3);
		$ret = null; 
		$this->conectar(); 
		//$rs = ldap_search ($this->conn, $this->baseUsr, "(sAMAccountName=$uid)");
		$rs = ldap_search ($this->conn, $this->baseUsr, "(sAMAccountName=$uid)");
		
		if ($rs !== false)
		{
			$entry = @ldap_first_entry ($this->conn, $rs);
			$ret = $this->getAttributes($entry); 
			@ldap_free_result($rs);
		}
		
		$this->desconectar();
				
		return ($ret);
	}

	
	/**
	 * Dado el DN de una entrada, devuelve un array con sus atributos o null si no la encuentra.  
	 * 
	 * @param string $dn Identificador único de la entrada (DN). Ejemplo: uid=rpn,ou=people,dc=mrec,dc=ar.
	 * @return array Atributos de la entrada o NULL si no la encuentra. 
	 */
	public function findEntry($dn)
	{
		$this->conectar(); 
		$rs = @ldap_read ($this->conn, $dn, '(objectClass=*)');

		if (!$rs) {
			throw new Exception ('LDAP: falló ldap_read: ' . ldap_error($this->conn));
		}
		
		$entry = ldap_first_entry($this->conn, $rs);  
		
		$ret = null; 
		
		if ($entry) {
			$ret = $this->getAttributes($entry);  
		}
		ldap_free_result($rs); 
		$this->desconectar(); 
		return $ret; 
	}
	
	/**
	 * Valida que sea válida la password de un usuario, para lo cual intenta hacer un 
	 * bind al directorio con su DN y su contraseña.
	 * Al terminar, no importa el resultado, no deja conexiones ldap abiertas.  
	 * 
	 * @param $dn Distingued Name del usuario (uid=xxxx,ou=xxx,dc=xxxx)
	 * @param $passwd La contraseña a verificar
	 * @return boolean 
	 */
	public function validarPasswd($dn, $passwd)
	{
		$this->conn = @ldap_connect ($this->server, $this->port);
		
		if (! $this->conn) {
			$this->conn = null;  
			throw new Exception ('LDAP: falló conexión al servidor ' . $this->server . ' puerto ' . $this->port);
		}
		
		$ok = @ldap_bind ($this->conn, $dn, $passwd);
		
		if ($ok)
			ldap_unbind ($this->conn);
			
		return $ok; 
	}
	
	/**
	 * Conecta con el servidor LDAP. 
	 * Si todo anda bien, queda en $this->conn la referencia a la conexión. 
	 * Si falla, lanza una exception. 
	 */
	public function conectar()
	{
		$this->conn = ldap_connect ($this->server, $this->port);
		
		if (! $this->conn) {
			$this->conn = null;  
			throw new Exception ('LDAP: falló conexión al servidor ' . $this->server . ' puerto ' . $this->port);
		}
		
		$ok = @ldap_bind ($this->conn, $this->ldapUser, $this->ldapPasswd);

		if (! $ok) { 
			$this->conn = null; 
			throw new Exception ("LDAP: falló bind al servidor {$this->server} puerto {$this->port}");
		}
		

	}
	
	/**
	 * Desconecta del servidor LDAP y libera recursos.
	 * Al finalizar, $this->conn queda en NULL. 
	 * Es inocuo si se llama sin haber conexión establecida.  
	 */
	public function desconectar()
	{
		if (! is_null($this->conn)) {
			@ldap_unbind ($this->conn);
			$this->conn = null; 
		}	
	}
	
	/**
	 * Hace una consulta pero sólo devuelve la cantidad de entradas que hay disponibles. 
	 * Abre y cierra una conexión específica para esto. 
	 * 
	 * @param string $filtro Filtro para la búsqueda, en sintaxis LDAP. 
	 * @param string $base Base para las búsquedas (si no se especifica, se usa la base para búsqueda de usuarios definida en parámetro global)
	 * @return int Cantidad de entradas encontradas
	 */
	public function countEntries($filtro, $base = null)
	{
		$this->conectar(); 
		
		$base = is_null($base) ? $this->baseUsr : $base; 

		/*
		 * Como lo único que quiero es contar la cantidad de entradas que cumplen el filtro, configuro el search
		 * para que genere la menor carga posible al servidor: sólo traigo un atributo ("dn") y ni siquiera pido
		 * que traiga los valores, sólo la definición. 
		 */
		$rs = @ldap_search ($this->conn, $base, $filtro, array('dn'), true);
		
		if (!$rs) {
			throw new Exception ('LDAP: falló search: ' . ldap_error($this->conn));
		}
		
		$count = @ldap_count_entries($this->conn, $rs);

		if ($count === false) {
			throw new Exception ('LDAP: falló count_entries: ' . ldap_error($this->conn));
		}
		
		ldap_free_result($rs);
		$this->desconectar();
		 
		return $count; 
	}
	
	/**
	 * Hace una búsqueda genérica en el directorio, devolviendo un conjunto de resultados en formato de array de dos dimensiones,
	 * donde la primera son las entradas encontradas y la segunda los atributos de cada una.
	 * Permite búsquedas paginadas, indicando $limit y $offset como se fuera una consulta SQL.    
 	 *
	 * @param string $filtro Filtro en formato LDAP. Ejemplo: (uid=rpn) Ejemplo2: (&(objectClass=person)(uid=rpn))
	 * @param string $base Punto de partida para la búsqueda (que siempre es recursiva). Si no se especifica, se usa el parámetro global de configuración de base para usuarios.
	 * @param array $atributos Atributos a traer para cada entrada. Si no se especifica, se traen todos 
	 * @param int $limit Cantidad máxima de registros a traer. (null = ilimitados)
	 * @param int $offset Cantidad de registros a "saltear"
	 * @return array
	 */
	public function search($filtro, $base, $atributos = null, $limit = null, $offset = 0)
	{
		
		$base = is_null($base) ? $this->baseUsr : $base; 
		
		$this->conectar();
		 
		$true_limit = $limit; 
		
		if (!is_null($limit) && $offset > 0) {
			// ejemplo: me pidieron 10 registros a partir de la posicion 20. Como ldap_search no tiene una forma de especificar OFFSET,
			// no me queda otra que traer 30 registros y saltear a mano los primeros 20. 
			$true_limit = $limit + $offset;  
		} 
		
		$rs = @ldap_search ($this->conn, $base, $filtro, $atributos, false, $true_limit);
		
		
		if (!$rs) {
			throw new Exception ('LDAP: falló search: ' . ldap_error($this->conn));
		}

		$ret = array(); 
		$count = 0; 
		$entry = ldap_first_entry ($this->conn, $rs); 

		while ($entry)
		{
			$count++;
			if ($count >= $offset) {	// salteo los primeros si me especificaron un offset
				$ret[] = $this->getAttributes($entry);
			}
			
			$entry = ldap_next_entry($this->conn, $entry);
		}
		
		$this->desconectar();

		return $ret; 
	}
	
}
