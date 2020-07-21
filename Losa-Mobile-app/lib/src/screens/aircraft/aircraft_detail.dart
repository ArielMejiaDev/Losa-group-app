import 'package:arielapp/src/models/aircraft.dart';
import 'package:flutter/material.dart';
import 'aircraft_calendar.dart';

class AircraftDetail extends StatelessWidget {

  final Aircraft aircraft;

  AircraftDetail({this.aircraft});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      //appBar: AppBar(title: Text(aircraft.type + ' ' + aircraft.plates),),
      body:  
      AircraftCalendar(aircraft: aircraft,)
      //Center(child: Text(aircraft.plates.toString()),),
    );
  }
}