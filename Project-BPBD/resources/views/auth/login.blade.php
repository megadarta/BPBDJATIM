@extends('auth.layout.main');

@section('content')
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .atas-login{
                background-color: black;
                height: 200px;
                width: 100%;
                /* position: absolute; */
                /* left: 0px;
                top: 0px; */
            }

            /* Form login  */
            .form-login{
                padding: 50px;
                /* position: absolute; */
                /* width: 500px; */
                height: 480px;
                /* left: 100px; */
                /* top: 60px; */
                margin-top: 30px;
                border-radius: 10px;
                box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.25);
            }
            .namelogin{
                /* margin-top: 50px; */
                color: black;
                font-size: 25px;
                margin-bottom: 20px;
                /* position: absolute; */
            }
            .form-login-text{
                text-align: justify!important;
            }
            .login-tengah{
                margin-bottom: 100px;
            }
            .button-login{
                background: #FE5E32;
                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                border-radius: 10px;
                color: white;
                width: 260px;
                height: 48px;
                border: none;
                margin-top: 100px;
                margin-left: auto;
                margin-right: auto;
            }
            .text-regis{
                font-family: IBM Plex Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 16px;
                line-height: 31px;

                color: rgba(0, 0, 0, 0.49);

            }
            .a-regis, .a-regis:hover{
                color: #FE5E32;
                text-decoration-line: none;
            }
            .a-lupapassword, .a-lupapassword:hover{
                font-family: IBM Plex Sans;
                font-style: normal;
                font-weight: bold;
                color: rgba(0, 0, 0, 0.49);
                font-size: 12px;
                margin-top: 10px;
            }
        </style>
 
        <!-- Tampilan Header Login -->
        <!-- <x-header /> -->

        <!-- Form Login -->
        <div className="d-flex flex-column align-items-center login-tengah container">
            <div className='form-login' id="form-login">
              <div className="namelogin"><b>LOGIN</b></div>
              <div className="d-flex flex-column justify-content-start">
                <label className="form-label form-login-text ">Email</label>
                <input type="email" className="form-control" id="email"></input>
                <label className="mt-4 form-label form-login-text ">Password</label>
                <input type="password" className="form-control" id="password"></input>

                <button className="button-login"><b>Login</b></button>
                <a href="" className="a-lupapassword">Lupa Password?</a>
              </div>
            </div>

            <div className="mt-4 text-regis">Tidak memiliki akun? <a className="a-regis" href="/register">Registrasi</a> </div>
        </div>
        @endsection

        <!-- Foooter Login -->
        <!-- <x-footer /> -->
   
