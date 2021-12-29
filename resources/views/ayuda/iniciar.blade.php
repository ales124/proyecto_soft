@extends('layouts.app')

@section('content')

<div class="container">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                <h5 class="card-title">Como iniciar en el sistema UCN</h5>
                <p class="card-text">Para acceder a la página y realizar varios procesos que este posee, en el siguiente botón se le enviará a un archivo de Google Drive llamado "Video How To", en donde
                    se explica el como poder interactuar correctamente dentro del sistema con sus distintas funcionalidades. </p>
                <div class="col-lg-12 py-3">
                    <div class="col-lg-12 text-center">
                        <a href=https://drive.google.com/drive/folders/1u9GZBj3z0PnoNFDIRP5uGmz7OLEnYLUA target="_blank" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Acceder a videos de ayuda') }}</a>
                    </div>
                </div>
                </form>
        </div>
    </div>
</div>
</div>
<div class="col-lg-12 py-3">
    <div class="col-lg-12 text-center">
        <a href="/help" style="background-color: #003057;border-color:#003057; color:white" type="button" id="boton" class="btn btn-outline-primary">{{ __('Volver') }}</a>
    </div>
</div>
</form>
</div>
</div>
<div class="col-lg-3 col-md-2"></div>
</div>
</div>

@endsection
