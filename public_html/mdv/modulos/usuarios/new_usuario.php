<div id="content-header">
    <div id="breadcrumb"> 
        <a href="<?=BASEURL;?>inicio" title="Ir a Inicio" class="tip-bottom"><i class="icon-home"></i> Inicio</a>
        <a href="<?=$mod_root;?>">Usuarios</a>
        <a href="<?=$mod_root;?>" class="current">Crear Usuario</a> 
    </div>
    <h1>Crear Usuario</h1>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
      	<div class="span12">

        	<div class="widget-box">
          		<div class="widget-title"> 
                    <span class="icon"> <i class="<?=$icono;?>"></i> </span>
                    <h5>Usuario</h5>
                </div>

                <div class="widget-content nopadding" id="printhere">
                    
                    <form class="form-horizontal" method="post" action="#" autocomplete="off" 
                        name="usuario" id="usuario" novalidate="novalidate">

                        <input type="hidden" name="modo" value="nuevo" />
                        <input type="hidden" name="ruta" value="<?=$mod_root;?>" />
                        <input type="hidden" name="acceso" value="1" />

                        <div class="control-group">
                            <label class="control-label">Nombre</label>
                            <div class="controls">
                                <input type="text" name="nombre" id="nombre" class="span4">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">E-mail</label>
                            <div class="controls">
                                <input type="text" name="email" id="email" class="span4">
                            </div>
                        </div>
                      
                        <div class="control-group">
                            <label class="control-label">Nick</label>
                            <div class="controls">
                                <input type="text" name="nick" id="nick" class="span4">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" name="password" id="password" class="span4">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Repite Password</label>
                            <div class="controls">
                                <input type="password" name="r_password" id="r_password" class="span4">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Perfil de Usuario</label>
                            <div class="controls">
                                <label>
                                    <input type="radio" name="profile" value="secretario" checked />
                                    &nbsp;Secretario
                                </label>
                                <label>
                                    <input type="radio" name="profile" value="vigilante_1" />
                                    &nbsp;1er Vigilante: Envía información a Compañeros (Nivel 2)
                                </label>
                                <label>
                                    <input type="radio" name="profile" value="vigilante_2" />
                                    &nbsp;2do Vigilante: Envía información a Aprendices (Nivel 1)
                                </label>  
                                <label>
                                    <input type="radio" name="profile" value="vigilante_3" />
                                    &nbsp;3er Vigilante: Envía información a Maestros (Nivel 3)
                                </label> 
                                <label>
                                    <input type="radio" name="profile" value="miembro" />
                                    &nbsp;Miembro
                                </label>                               
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Nivel</label>
                            <div class="controls">
                                <label>
                                    <input type="radio" name="nivel" value="1" checked />
                                    &nbsp;Nivel 1
                                </label>
                                <label>
                                    <input type="radio" name="nivel" value="2" />
                                    &nbsp;Nivel 2
                                </label>
                                <label>
                                    <input type="radio" name="nivel" value="3" />
                                    &nbsp;Nivel 3
                                </label>                               
                            </div>
                        </div>

                        <div class="form-actions">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            &nbsp;&nbsp;
                            <a href="<?=$mod_root;?>" class="btn btn-danger">Cancelar</a>
                        </div>

                    </form>

                </div>
       		</div>

        </div>
    </div>
</div>