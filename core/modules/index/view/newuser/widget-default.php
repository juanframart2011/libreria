<div class="row">
    <div class="col-md-12">
        <h1>Agregar Usuario</h1>
        <br>
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adduser" role="form">
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                <div class="col-md-6">
                    <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
                </div>
            </div>
            <div class="form-group">
               
                <div class="col-md-6">
                   
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
                <div class="col-md-6">
                    <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
                </div>
            </div>
            <div class="form-group">
                
                <div class="col-md-6">
                    
                </div>
            </div>
            <div class="form-group">
               
                <div class="col-md-6">
                   
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a*</label>
                <div class="col-md-6">
                    <input type="password" name="password" required class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Tipo de Usuario</label>
                <div class="col-md-6">
                    <select class="form-control" name="is_admin" id="is_admin" required>
                        <option value="">Seleccionar tipo de Usuario</option>
                        <option value="1">Administrador</option>
                        <option value="2">Vendedor</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
              
                <div class="col-md-6">
                  
                </div>
            </div>
          
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                </div>
            </div>
        </form>
    </div>
</div>