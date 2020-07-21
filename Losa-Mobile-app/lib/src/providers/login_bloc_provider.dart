import 'package:flutter/material.dart';
import '../blocs/login_bloc.dart';
export '../blocs/login_bloc.dart';


class LoginBlocProvider extends InheritedWidget {

  //props
  final bloc = LoginBloc();

  //constructor
  LoginBlocProvider({Key key, Widget child}) : super(key:key, child:child);
  
  //inheritedWidget must have it
  bool updateShouldNotify(InheritedWidget oldWidget) => true;

  //static method to call bloc
  static LoginBloc of(BuildContext context) {
    return (context.inheritFromWidgetOfExactType(LoginBlocProvider) as LoginBlocProvider).bloc;
  }

}