import 'package:flutter/material.dart';
import '../../widgets/pallette/colors_pallete.dart';
import '../../screens/main_menu.dart';
import '../../providers/properties_bloc_provider.dart';
import '../../screens/property/property_list.dart';
import '../../screens/aircraft/aircrafts_list.dart';
import '../../screens/personal_data/contacts.dart';
import '../../models/losa_contacts.dart';
import 'package:http/http.dart' as http;
import 'dart:async';
import 'contacts.dart';

class PersonalData extends StatefulWidget {
  PersonalData({Key key}) : super(key: key);
  @override
  _PersonalDataState createState() => _PersonalDataState();
}

class _PersonalDataState extends State<PersonalData> {
  final GlobalKey<ScaffoldState> _scaffoldKey = new GlobalKey<ScaffoldState>();

  /* ---------------------------- Future to get API --------------------------- */

// Future <List <LosaContacts>> _getLosaContacts() async {
//   var url = 'http://192.168.0.2/losa/public/api/v1/aircrafts';
//   var data = await http.get(url, headers: { "Accept": "application/json", 'api-key' : '\$2y\$10\$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO' });
//   var response = json.decode(data.body);
//   List <LosaContacts> losaContacts = [];

//   for (var aircraftData in response) {
//     Aircraft aircraft = Aircraft(id: aircraftData['id'], type: aircraftData['type'], passengers: aircraftData['passengers'], plates: aircraftData['plates']);
//     aircrafts.add(aircraft);
//   }

//   return aircrafts;
  

// }

/* ----------------------------- End Future API ----------------------------- */


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Center(child: Text('DATOS PERSONALES', style: TextStyle(fontFamily: 'Revisal', fontWeight: FontWeight.w200, letterSpacing: 1.0),),),
        backgroundColor: Color(ColorPallete().darkestBlue),
        elevation: 0.0,
        leading: IconButton(
          icon: Image.asset('assets/images/icon-menu.png', fit: BoxFit.cover, width: 25.0, color: Colors.white,),
          onPressed: () => _scaffoldKey.currentState.openDrawer()
        ),
      ),
      key: _scaffoldKey,
      drawer: 
      Drawer(
        child: 
          Container(
            color: Color(ColorPallete().darkestBlue),
            child: 
              ListView(
              children: <Widget>[
                ListTile(
                  leading: Image.asset('assets/images/logo-white.png', width: 125.0, height: 125.0),
                ),
                SizedBox(height: 10.0,),
                ListTile(
                  leading: Icon(Icons.view_module, color: Colors.white,),
                  title: Text("Inicio", style: TextStyle(color: Colors.white, fontFamily: 'Revisal', fontSize: 16.0, letterSpacing: 0.64, fontWeight: FontWeight.w400),),
                  onTap: (){
                    Navigator.of(context).pop();
                    Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context) => MainMenu()));
                  },
                ),
                ListTile(
                  leading: Icon(Icons.contacts, color: Colors.white,),
                  title: Text("Contactos", style: TextStyle(color: Colors.white, fontFamily: 'Revisal', fontSize: 16.0, letterSpacing: 0.64, fontWeight: FontWeight.w400),),
                  onTap: (){
                    Navigator.of(context).pop();
                    Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context) => Contacts()));
                  },
                ),
                ListTile(
                  leading: Icon(Icons.contact_mail, color: Colors.white,),
                  title: Text("Datos personales", style: TextStyle(color: Colors.white, fontFamily: 'Revisal', fontSize: 16.0, letterSpacing: 0.64, fontWeight: FontWeight.w400),),
                  onTap: (){
                    Navigator.of(context).pop();
                    Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context) => PersonalData()));
                  },
                ),
                ListTile(
                  leading: Icon(Icons.home, color: Colors.white,),
                  title: Text("Propiedades", style: TextStyle(color: Colors.white, fontFamily: 'Revisal', fontSize: 16.0, letterSpacing: 0.64, fontWeight: FontWeight.w400),),
                  onTap: (){
                    Navigator.of(context).pop();
                    Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context) => PropertiesBlocProvider(child: PropertyList(),) ));
                  },
                ),
                ListTile(
                  leading: Icon(Icons.airplanemode_active, color: Colors.white,),
                  title: Text("Aeronaves", style: TextStyle(color: Colors.white, fontFamily: 'Revisal', fontSize: 16.0, letterSpacing: 0.64, fontWeight: FontWeight.w400),),
                  onTap: (){
                    Navigator.of(context).pop();
                    Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context) => AircraftsList() ));
                  },
                ),
              ],
            ),
          )
      ),
      body:
      ListView(
        children: <Widget>[
          Container(
            height: 150,
            color: Color(ColorPallete().lightGrey),
            child: Center(child: Text('David Arturo Gutierrez Dominguez', style: TextStyle(
              fontFamily: 'DomaineText',
              fontSize: 18.0,
              color: Color(ColorPallete().darkestBlue)
            ),),),
          ),
          Card(
            margin: EdgeInsets.all(5.0),
            elevation: 2.0,
            child: 
            Container(
              padding: EdgeInsets.all(10.0),
              child: 
                ListTile(
                  leading: Icon(Icons.contacts),
                  title: Text('DPI', style: TextStyle(
                    fontFamily: 'Revisal',
                    fontSize: 15.0,
                    fontWeight: FontWeight.w300,
                    color: Color(ColorPallete().darkestBlue)
                  ),),
                  trailing: 
                    Container(
                      child: Text('1954441216 \n 14/08/2019', textAlign: TextAlign.center, style: TextStyle(
                        fontFamily: 'Revisal',
                        fontSize: 13.0,
                        fontWeight: FontWeight.w300,
                        color: Color(ColorPallete().letterGrey)
                      ),),
                    ),
                ),
            )
          ),

          Card(
            margin: EdgeInsets.all(5.0),
            elevation: 2.0,
            child: Container(
              padding: EdgeInsets.all(10.0),
              child: 
                ListTile(
                  leading: Icon(Icons.directions_car),
                  title: Text('Licencia', style: TextStyle(
                    fontFamily: 'Revisal',
                    fontSize: 15.0,
                    fontWeight: FontWeight.w300,
                    color: Color(ColorPallete().darkestBlue)
                  ),),
                  trailing: 
                    Container(
                      child: Text('1629987650101 \n 13/07/2019', textAlign: TextAlign.center, style: TextStyle(
                        fontFamily: 'Revisal',
                        fontSize: 13.0,
                        fontWeight: FontWeight.w300,
                        color: Color(ColorPallete().letterGrey)
                      ),),
                    ),
                ),
            )
          ),

          Card(
            margin: EdgeInsets.all(5.0),
            elevation: 2.0,
            child: 
            Container(
              padding: EdgeInsets.all(10.0),
              child: 
                ListTile(
                  leading: Icon(Icons.lock),
                  title: Text('Seguro', style: TextStyle(
                    fontFamily: 'Revisal',
                    fontSize: 15.0,
                    fontWeight: FontWeight.w300,
                    color: Color(ColorPallete().darkestBlue)
                  ),),
                  trailing: 
                    Container(
                      child: Text('Seguros el Roble \n Poliza N RB-004654', textAlign: TextAlign.center, style: TextStyle(
                        fontFamily: 'Revisal',
                        fontSize: 13.0,
                        fontWeight: FontWeight.w300,
                        color: Color(ColorPallete().letterGrey)
                      ),),
                    ),
                ),
            )
          ),

          Card(
            margin: EdgeInsets.all(5.0),
            elevation: 2.0,
            child: 
            Container(
              padding: EdgeInsets.all(10.0),
              child: 
                ListTile(
                  leading: Icon(Icons.book),
                  title: Text('Pasaporte', style: TextStyle(
                    fontFamily: 'Revisal',
                    fontSize: 15.0,
                    fontWeight: FontWeight.w300,
                    color: Color(ColorPallete().darkestBlue)
                  ),),
                  trailing: 
                    Container(
                      child: Text('1954441216 \n 14/08/2019', textAlign: TextAlign.center, style: TextStyle(
                        fontFamily: 'Revisal',
                        fontSize: 13.0,
                        fontWeight: FontWeight.w300,
                        color: Color(ColorPallete().letterGrey)
                      ),),
                    ),
                ),
            )
          ),

          Card(
            margin: EdgeInsets.all(5.0),
            elevation: 2.0,
            child: 
            Container(
              padding: EdgeInsets.all(10.0),
              child: 
                ListTile(
                  leading: Icon(Icons.book),
                  title: Text('Visa', style: TextStyle(
                    fontFamily: 'Revisal',
                    fontSize: 15.0,
                    fontWeight: FontWeight.w300,
                    color: Color(ColorPallete().darkestBlue)
                  ),),
                  trailing: 
                    Container(
                      child: Text('1954441216 \n 14/08/2019', textAlign: TextAlign.center, style: TextStyle(
                        fontFamily: 'Revisal',
                        fontSize: 13.0,
                        fontWeight: FontWeight.w300,
                        color: Color(ColorPallete().letterGrey)
                      ),),
                    ),
                ),
            )
          ),

          

        //---------------------------------------------------------------
        ],
      )
    );
  }
}


