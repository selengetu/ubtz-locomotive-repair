<div class="body"></div>
        <div class="grad"></div>
        <div class="header">
            <div><span>Цахим пасспортын</span> <br><span>програм хангамж</span></div>
        </div>
        <br>
        <div class="login">
        
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
  
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="И-мейл">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Нууц үг">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                        
                                <button type="submit" class="btn btn-primary">
                                    Нэвтрэх
                                </button>
                                 
                        </div>
                    </form>
        </div>
        <style type="text/css">
@font-face {  
     font-family:Perforama; src: url('{{ asset('fonts/Perforama.otf') }}'); 
}

        .body{
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url('image/galt.jpg');
            background-size: cover;
            -webkit-filter: blur(3px);
            z-index: 0;
        }

            .grad{
                position: absolute;
                top: -20px;
                left: -20px;
                right: -40px;
                bottom: -40px;
                width: auto;
                height: auto;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
                z-index: 1;
                opacity: 0.7;
            }

            .header{
                position: absolute;
                top: calc(50% - 35px);
                left: calc(35% - 270px);
                z-index: 2;
            }
            
            .header div{
                float: left;
                color: #2EB9A9;
                font-size: 25px;
                font-weight: 200;
                font-family: Perforama;
            }

            .header div span{
                color:#ffffff;



            }

            .login{
                position: absolute;
                top: calc(50% - 75px);
                left: calc(38% - 50px);
                height: 150px;
                width: 350px;
                padding: 10px;
                z-index: 2;
            }

            .login input[type=email]{
                width: 250px;
                height: 30px;
                background: #fff;
                border: 1px solid rgba(255,255,255,0.6);
                border-radius: 2px;
                color: #2EB9A9;
                font-family: 'Days';
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
            }

            .login input[type=password]{
                width: 250px;
                height: 30px;
                background: #fff;
                border: 1px solid rgba(255,255,255,0.6);
                border-radius: 2px;
                color: #2EB9A9;
                font-family: 'Days';
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
                margin-top: 10px;
            }

            .login button{
                width: 250px;
                height: 35px;
                background: #fff;
                border: 1px solid #fff;
                cursor: pointer;
                border-radius: 2px;
                color: #a18d6c;
                font-family: 'Days';
                font-size: 16px;
                font-weight: 400;
                padding: 6px;
                margin-top: 10px;
            }

            .login input[type=button]:hover{
                opacity: 0.8;
            }

            .login input[type=button]:active{
                opacity: 0.6;
            }

            .login input[type=text]:focus{
                outline: none;
                border: 1px solid rgba(255,255,255,0.9);
            }

            .login input[type=password]:focus{
                outline: none;
                border: 1px solid rgba(255,255,255,0.9);
            }

            .login input[type=button]:focus{
                outline: none;
            }

            ::-webkit-input-placeholder{
               color: #2EB9A9;
            }

            ::-moz-input-placeholder{
               color: #2EB9A9;
            }
        </style>