import 'package:flutter/material.dart';
import 'screens/login.dart';
import 'providers/login_bloc_provider.dart';

class App extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Losa app',
      theme: ThemeData(
        primarySwatch: Colors.blueGrey
      ),
      debugShowCheckedModeBanner: false,
      home: LoginBlocProvider(child: Login(),),
    );
  }
}