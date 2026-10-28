<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Licitaciones</title>
</head>
<body>
<!-- Marco superior completo -->
<div style="width: 100%; border: 2px solid #e2e8f0; background: #f8fafc; margin-bottom: 2rem;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 1rem 2rem;">
        <div id="header" style="display: flex; align-items: center; height: 90px;">
            <div id="logo" style="padding: 10px; border-right: 2px solid #e2e8f0;">
                <img id="form:logoMVL" 
                     src="logo01.gif" 
                     style="height: 65px; width: auto; display: block;">
            </div>
            <!-- Espacio para posibles elementos adicionales a la derecha -->
            <div style="padding-left: 20px; font-size: 1.2rem; color: #2d3748; font-weight: 500;">
                Sistema de Adjudicaciones
            </div>
        </div>
    </div>
</div>

<!-- Contenido del formulario (manteniendo el mismo estilo anterior) -->
<div style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
    <div style="text-align: center;">
        <form method="POST" action="xaxa3.php" style="display: inline-block;">
            <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap; justify-content: center;">
                <span style="font-size: 1.1rem; color: #2d3748; font-weight: 500;">
                    Ejercicio Fiscal:
                </span>
                
                <input type="number" 
                       id="ejercicio" 
                       name="ejercicio" 
                       value="2024"
                       style="padding: 8px 12px;
                              width: 100px;
                              border: 2px solid #e2e8f0;
                              border-radius: 6px;
                              font-size: 1rem;
                              text-align: center;">
                
                <button type="submit" 
                        style="padding: 8px 25px;
                               background: #4f46e5;
                               color: white;
                               border: none;
                               border-radius: 6px;
                               cursor: pointer;">
                    Consultar
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Estilos para hover y responsive */
    button:hover {
        background: #4338ca;
        transform: translateY(-1px);
    }
    
    @media (max-width: 768px) {
        #header {
            height: auto !important;
            flex-direction: column;
            align-items: flex-start;
        }
        
        #logo {
            border-right: none !important;
            border-bottom: 2px solid #e2e8f0;
            width: 100%;
            text-align: center;
        }
        
        #logo img {
            height: 50px !important;
        }
        
        .titulo-sistema {
            padding: 15px 0 !important;
            width: 100%;
            text-align: center;
        }
    }
</style>
    
</body>
</html>
