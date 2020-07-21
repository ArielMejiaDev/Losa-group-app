import 'package:flutter/material.dart';

class WaterMarkWidget extends StatelessWidget {
  final double height;
  WaterMarkWidget({this.height});
  @override
  Widget build(BuildContext context) {
    return Image.asset('assets/images/water-mark.png', height:height,);
  }
}