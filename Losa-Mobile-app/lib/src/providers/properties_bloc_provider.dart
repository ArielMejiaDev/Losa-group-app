import 'package:flutter/material.dart';
import '../blocs/properties_bloc.dart';

class PropertiesBlocProvider extends InheritedWidget {

  //props 
  final bloc = PropertiesBloc();

  //constructor
  PropertiesBlocProvider({Key key, Widget child}) : super(key:key, child:child);

  //inheritedWidget must have it
  bool updateShouldNotify(InheritedWidget oldWidget) => true;

  //methods 
  static PropertiesBloc of(BuildContext context) {
    return (context.inheritFromWidgetOfExactType(PropertiesBlocProvider) as PropertiesBlocProvider).bloc;
  }

}