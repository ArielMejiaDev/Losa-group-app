import 'package:flutter/material.dart';

class TitleWidget extends StatelessWidget {
  //props 
  final String title;
  //constructor 
  TitleWidget({this.title});
  @override
  Widget build(BuildContext context) {
    return Text(
      title,
      style: TextStyle(
        fontSize: 24.0
      ),
    );
  }
}