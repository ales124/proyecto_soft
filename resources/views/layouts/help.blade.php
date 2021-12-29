@extends('layouts.app')

@section('content')

<div class="container">
  <div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        Ayuda del Sistema Web
      </h3>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Descripción del sistema UCN</h5>
              <p class="card-text">Describe el objetivo del entregable basada en las necesidades del cliente.</p>
              <a href="/descripcion" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Ingresar') }}</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Definición de roles</h5>
              <p class="card-text">Presenta los diferentes roles que el usuario puede poseer al ingresar al sistema UCN.</p>
              <a href="/definroles" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Ingresar') }}</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Como iniciar en el sistema</h5>
              <p class="card-text">Describe el proceso paso a paso del cómo ingresar correctamente al sistema UCN.</p>
              <a href="/iniciar" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Ingresar') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="col-lg-12 py-3">
    <div class="col-lg-12 text-center">
      <a href="/home" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Volver') }}</a>
    </div>
  </div>
  </form>
</div>
</div>
<div class="col-lg-3 col-md-2"></div>
</div>
</div>

@endsection
