import 'package:flutter/material.dart';
import '../../models/aircraft.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import '../../widgets/ui/image_card.dart';
import 'aircraft_detail.dart';

class AircraftsData extends StatefulWidget {
  @override
  _AircraftsDataState createState() => _AircraftsDataState();
}

class _AircraftsDataState extends State<AircraftsData> {

/* ---------------------------- Future to get API --------------------------- */

Future <List <Aircraft>> _getAircrafts() async {

  //var url = 'http://104.214.71.209/api/v1/aircrafts';
  var url = 'http://23.100.120.18/api/v1/aircrafts';
  var data = await http.get(url, headers: { "Accept": "application/json", 'api-key' : '\$2y\$10\$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO' });
  var response = json.decode(data.body);
  
  List <Aircraft> aircrafts = [];

  for (var aircraftData in response) {
    Aircraft aircraft = Aircraft(id: aircraftData['id'], type: aircraftData['type'], passengers: aircraftData['passengers'], plates: aircraftData['plates']);
    aircrafts.add(aircraft);
  }

  return aircrafts;
  

}

/* ----------------------------- End Future API ----------------------------- */

  @override
  Widget build(BuildContext context) {
    return FutureBuilder(
      future: _getAircrafts(),
      builder: (BuildContext context, AsyncSnapshot snapshot) {

        if (snapshot.data == null) {
          return Center(child: CircularProgressIndicator());
        } else {
        

          return ListView.builder(
            itemCount: snapshot.data.length,
            itemBuilder: (BuildContext context, int index){
              return ImageCard(
                title: snapshot.data[index].type, 
                subtitle: snapshot.data[index].plates, 
                backgroundImage: 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1353&q=80', 
                route: AircraftDetail(aircraft: snapshot.data[index])
              );
              // return ListTile(
              //   title: Text(snapshot.data[index].type),
              // );
            },
          );

        }

      },
    );
  }
}