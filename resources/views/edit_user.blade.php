@extends('layouts.base')
@section('products')
    <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
        <div class=" col-lg-4 bg-danger rounded dissenyBorders">
            <form class="update" name="update" method="post">
                @csrf
                <h3 class="display-4 mb-2">Editar usuario</h3>
                <div>
                    <label>DNI:</label>
                    <input type="text" id="dni" name="dni" required value="{{ old('dni', $usuarios->dni) }}"
                        disabled="disabled" />
                </div>
                <div>
                    <label>First Name:</label>
                    <input class="name" type="text" id="name" name="name" required
                        value="{{ old('name', $usuarios->name) }}" />
                </div>
                <div>
                    <label>Last Name:</label>
                    <input type="text" id="lastname" name="lastname" required
                        value="{{ old('lastname', $usuarios->lastname) }}" />
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" id="email" name="email" required value="{{ old('email', $usuarios->email) }}" />
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" id="passwd" name="passwd" />
                    <p><small> *Dejar vacio para no modificar </small></p>
                </div>
                <div>
                    <label>Data nacimiento:</label>
                    <input type="date" id="datanac" name="datanac" required value="{{ old('datanac', $date) }}"
                        disabled="disabled" />
                </div>

                @if (session('user')->type_user == 'A')
                    <div>
                        <label>Tipo de usuario: </label>
                        <select name="type" id="type">
                            <option value="C">Cliente</option>
                            <option value="A">Administrador</option>
                        </select>
                    </div>
                @endif

                <div>
                    <input class="btn btn-info btn-mg" type="submit" value="Actualizar usuario" id="submit" name="submit" />
            </form>
        </div>
    </div>

@endsection