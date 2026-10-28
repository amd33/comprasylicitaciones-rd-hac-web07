 <?php
    function validarPasswd($dn, $passwd,$conn)
      {

       $ok = ldap_bind ($conn, $dn, $passwd);
       

           
           return $ok;
      }

    
      $ldapserver = 'mvlcuvldc01.vicentelopez.gov.ar';
      $ldapuser      = $_REQUEST['email'];
      $ldappass     = $_REQUEST['password'];
      $ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");

      $ok = validarPasswd($ldapuser, $ldappass, $ldapconn);
      if($ok)
      {
      echo '1';
      }else{echo '0';}
    
    ?>