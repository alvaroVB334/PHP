
<body>

<form method="POST" action="recepcionDatos2.php">

  <div class="container">

    <div class="row">


      <div class="col-lg-9 col-sm-9">

        <!-- Margenes con mb mr ml mt -sm-distancia-->
        <!-- Misma linea -->
        <div class="form-group row mb-sm-2 mt-sm-2">
          <label for="nombre" class="col-lg-3 col-form-label">Nombre:</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
        </div>

        <div class="form-group row">
          <label for="clave" class="col-lg-3 col-form-label">Ingrese su clave:</label>
          <div class="col-lg-6">
            <input type="password" class="form-control" id="clave" name="clave">
            <!--Comentario al pasar-->
            <small class="form-text text-muted">Debe tener al menos 10 caracteres, de los cuales al menos uno debe ser un número.</small>
          </div>
        </div>

        <div class="form-group ml-3">
          <label for="comentarios">Deje aquí sus comentarios</label>
          <textarea class="form-control mb-3 " rows="5" id="comentarios" name="comentarios"></textarea>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="condAc" id="checkbox4" name="subscripcion[]" checked>
          <label class="form-check-label" for="checkbox4">
            Acepto Las Condiciones
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="insc" id="checkbox5" name="subscripcion[]" >
          <label class="form-check-label" for="checkbox5">
            Apuntarme a las Noticias
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="poncho" id="checkbox3" name="subscripcion[]">
          <label class="form-check-label" for="checkbox6">
            Llevo un Poncho
          </label>
        </div>
        <br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" value="M" id="radio4" name="sexo">
          <label class="form-check-label" for="radio4">
            Masculino
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" value="F" id="radio5" name="sexo">
          <label class="form-check-label" for="radio5">
            Femenino
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" value="X" id="radio6" name="sexo">
          <label class="form-check-label" for="radio6">
            Mixto
          </label>
        </div>
        <br>
        <div class="form-check form-switch mt-sm-3">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="default">
          <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
        </div>
        <div class="form-check form-switch mb-sm-3">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="checked" checked>
          <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
        </div>

        <div class="mb-3">
          <label for="control1">Seleccione un elemento</label>
          <select class="form-control w-25" id="control1" name="planta">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>

        <div class="form-group">
          <label for="control2">Seleccione varios elementos</label>
          <select multiple class="form-control w-25" id="control2" name="modulos[]" >
            <option value="ES">Entorno Servidor</option>
            <option  value="DE">Despligue</option>
            <option  value="EM">Empresa</option>
            <option  value="DI">Diseño</option>
            <option  value="CL">Cliente</option>
          </select>
        </div>

        <hr />
        <!--Sombra shadow p-3 mb-5 bg-body rounded-->
        <!-- btn btn-default boton por defecto-->
        <!-- px-4 py-5 pading x e y -->

        <button type="submit" class="btn btn-default mb-sm-2 shadow p-3 mb-5 bg-body rounded px-3 py-2">Enviar</button>

      </div>
    </div>
  </div>
</form>
