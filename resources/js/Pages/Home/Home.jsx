import styles from "./Home.scss";
import { Head, Link, useForm } from "@inertiajs/inertia-react";

export default function Home(props) {
    return (
        <>
            <Head title="login"></Head>
            <div class="login-container">
                <div class="logo-container vertical-center">
                    <img src="assets/img/gallery/logo_login.png" alt="" />
                </div>
                <div class=" vertical-center text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <img
                                    class="mb-4"
                                    src="assets/img/gallery/logo_login2.png"
                                    width="200"
                                />
                                <h1 class="h3 mb-3 fw-normal">
                                    Inicio de sesión
                                </h1>
                                {/* @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif */}
                                {/* {{ errors }} */}
                                <form id="loginForm" action="" method="POST">
                                    @csrf
                                    <div class="form-floating mb-2">
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="floatingInput"
                                            placeholder=""
                                            name="email"
                                            required
                                        />
                                        <label for="floatingInput">
                                            Correo electronico
                                        </label>
                                    </div>
                                    <div class="form-floating">
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="floatingPassword"
                                            placeholder=""
                                            name="password"
                                            required
                                        />
                                        <label for="floatingPassword">
                                            Contraseña
                                        </label>
                                    </div>
                                    <div class="checkbox mb-3">
                                        <label>
                                            <input
                                                type="checkbox"
                                                value="remember-me"
                                            />{" "}
                                            Recuerdame
                                        </label>
                                    </div>
                                    <button
                                        class="w-100 btn btn-lg btn-primary"
                                        type="submit"
                                    >
                                        Iniciar Sesión
                                    </button>
                                    <p class="mt-5 mb-3 text-muted">
                                        <a
                                            id="forgot-password"
                                            href="/register"
                                        >
                                            Regístrate aquí
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
