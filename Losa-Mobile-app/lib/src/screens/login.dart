import 'package:flutter/material.dart';
import '../widgets/ui/brake_widget.dart';
import '../widgets/ui/logo_widget.dart';
import '../blocs/login_bloc.dart';
import '../providers/login_bloc_provider.dart';
import '../widgets/pallette/colors_pallete.dart';
import '../widgets/ui/water_mark.dart';

class Login extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final loginBloc = LoginBlocProvider.of(context);
    loginBloc.validateSession(context);
    return Scaffold(
      backgroundColor: Colors.white,
      body: Center(
        child: ListView(
          //shrinkWrap: true,
          padding: EdgeInsets.fromLTRB(24.0, 150.0, 24.0, 24.0),
          children: <Widget>[
            LogoWidget(height: 80.0,),
            BrakeWidget(),
            _emailInput(loginBloc),
            BrakeWidget(),
            _passwordInput(loginBloc),
            BrakeWidget(),
            BrakeWidget(),
            BrakeWidget(),
            Stack(
              children: <Widget>[
                Positioned(
                  child: 
                  Container(
                    alignment: AlignmentDirectional(20.0, -100.0),
                    margin: EdgeInsets.symmetric(vertical: 0.0),
                    //margin: EdgeInsets.fromLTRB(100.0, 0.0, 0.0, 0.0),
                    child: _waterMark(),
                  ),
                ),
                Positioned(
                  top: 40.0,
                  right: 0.0,
                  left: 0.0,
                  child: _submitButton(loginBloc),
                ),
              ],
            )
          ],
        ),
      ),
    );
  }

  Widget _emailInput(LoginBloc loginBloc) {

    return StreamBuilder(
      stream: loginBloc.emailValidator,
      builder: (context, snapshot) {
        return TextField(
          style: TextStyle(
            fontFamily: 'Revisal',
            fontWeight: FontWeight.w300,
            fontSize: 15.0,
            letterSpacing: 0.75,
            color: Color(ColorPallete().letterGrey)
          ),
          onChanged: loginBloc.email,
          autofocus: true,
          keyboardType: TextInputType.emailAddress,
          decoration: InputDecoration(
            //labelText: 'Email',
            hintText: 'Usuario',
            errorText: snapshot.error,
            contentPadding: EdgeInsets.fromLTRB(120.0, 20.0, 30.0, 20.0),
            border: OutlineInputBorder(),
          ),
        );
      },
    );

  }

  Widget _passwordInput(LoginBloc loginBloc) {

    return StreamBuilder(
      stream: loginBloc.passwordValidator,
      builder: (context, snapshot) {
        return TextField(
          style: TextStyle(
            fontFamily: 'Revisal',
            fontWeight: FontWeight.w300,
            fontSize: 15.0,
            letterSpacing: 0.75,
            color: Color(ColorPallete().letterGrey)
          ),
          onChanged: loginBloc.password,
          obscureText: true,
          decoration: InputDecoration(
            //labelText: 'Passsword',
            hintText: 'Contraseña',
            errorText: snapshot.error,
            contentPadding: EdgeInsets.fromLTRB(120.0, 20.0, 20.0, 20.0),
            border: OutlineInputBorder(),
          ),
        );
      },
    );

  }

  Widget _submitButton(LoginBloc loginBloc) {

    return StreamBuilder(
      stream: loginBloc.submitValidator,
      builder: (context, snapshot) { 
        return 
        RaisedButton(
          // child:ListTile(
          //         title: 
          //           Container(margin: EdgeInsets.fromLTRB(100.0, 0.0, 0.0, 0.0), 
          //             child: Text('INGRESAR', style: TextStyle(fontSize: 13.0, fontFamily: 'Revisal', color: Color(0xFFCCCED4), letterSpacing: 1.73),),),
          //         trailing: 
          //           Icon(Icons.arrow_forward, color: Colors.white,),
          //       ),
          child: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: <Widget>[
              Container(margin: EdgeInsets.fromLTRB(0.0, 0.0, 5.0, 0.0), 
                      child: Text('INGRESAR', style: TextStyle(fontSize: 13.0, fontFamily: 'Revisal', color: Color(0xFFCCCED4), letterSpacing: 1.73),),),
                      Icon(Icons.arrow_forward)
            ],
          ),
          color: Color(ColorPallete().darkestBlue),
          textColor: Colors.white,
          padding: EdgeInsets.fromLTRB(15.0, 18.0, 18.0, 18.0),
          onPressed: snapshot.hasData ? () => loginBloc.submitLogin(context) : null,
        );
        // FlatButton.icon(
        //   color: Color(ColorPallete().darkestBlue),
        //   label: Text('INGRESAR', style: TextStyle(fontSize: 13.0, fontFamily: 'Revisal', color: Color(0xFFCCCED4), letterSpacing: 1.73),),
        //   icon: Icon(Icons.arrow_forward),
        //   onPressed: (){},
        // );
      },
    );  

  }

  Widget _waterMark() {
    return WaterMarkWidget(height: 350.0,);
  }

}