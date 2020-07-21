import 'package:flutter/material.dart';

class LogoWidget extends StatelessWidget {
  final double height;
  LogoWidget({this.height});
  @override
  Widget build(BuildContext context) {
    return Hero(
      tag: 'Logo',
      child: Image.asset('assets/images/logo.png', height:height,),
    );
  }
}