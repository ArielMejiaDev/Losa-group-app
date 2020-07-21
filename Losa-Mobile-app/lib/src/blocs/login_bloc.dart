import 'package:flutter/material.dart';
import 'package:rxdart/rxdart.dart';
import 'transformers/login_validator.dart';
import 'dart:async';
import '../repositories/login_repository.dart';
import '../screens/main_menu.dart';
import '../widgets/ui/alert.dart';
import 'package:shared_preferences/shared_preferences.dart';
import '../providers/properties_bloc_provider.dart';

class LoginBloc extends LoginValidator{

  //props
  final String authToken = 'false';
  //final String userId = '';
  final _emailController = BehaviorSubject<String>();
  final _passwordController = BehaviorSubject<String>();

  //add stream 
  Stream<String> get emailValidator => _emailController.stream.transform(validateEmail);
  Stream<String> get passwordValidator => _passwordController.stream.transform(validatePassword);
  Stream<bool> get submitValidator => Observable.combineLatest2(emailValidator, passwordValidator, (e,p) => true);

  //output sink 

  Function(String) get email => _emailController.sink.add;
  Function(String) get password => _passwordController.sink.add;

  //methods 
  validateSession(context) async{
    final SharedPreferences prefs = await SharedPreferences.getInstance();
    if (prefs.getBool(authToken) == true) {
      //Navigator.pushReplacement(context, MaterialPageRoute(builder: (BuildContext context)=>PropertiesBlocProvider(child: PropertyList(),)));
      //var id = prefs.getString(userId);
      Navigator.pushReplacement(context, MaterialPageRoute(builder: (BuildContext context)=>PropertiesBlocProvider(child: MainMenu(),)));
    }
  }

  submitLogin(context) {
    final email = _emailController.value;
    final password = _passwordController.value;
    auth(email, password, context);
  }

  auth(email, password, context) async {

    final loginRepository = LoginRespository();
    final authStatus = await loginRepository.auth(email: email, password: password);

    if (authStatus['authenticated'] == true) {
      //Navigator.pushReplacement(context, MaterialPageRoute(builder: (BuildContext context) => PropertiesBlocProvider(child: PropertyList(),)));
      //var userId = authStatus['data']['id'].toString();
      Navigator.pushReplacement(context, MaterialPageRoute(builder: (BuildContext context)=>PropertiesBlocProvider(child: MainMenu(),)));
    } else {
      showAlertDialog(context, title: 'Error de authenticacion', content: 'Usuario o password invalido', buttonText: 'Volver a authenticarse');
    }

  }

  //dispose
  dispose() {
    _emailController.close();
    _passwordController.close();
  }

}