import 'package:flutter/material.dart';
import '../../widgets/pallette/colors_pallete.dart';
import 'aircrafts_data.dart';

import '../main_menu.dart';
import '../personal_data/personal_data.dart';
import '../../providers/properties_bloc_provider.dart';
import '../property/property_list.dart';
import '../personal_data/contacts.dart';


class AircraftsList extends StatefulWidget {
  AircraftsList({Key key}) : super(key: key);

  _AircraftsListState createState() => _AircraftsListState();
}

class _AircraftsListState extends State<AircraftsList> {
  final GlobalKey<ScaffoldState> _scaffoldKey = new GlobalKey<ScaffoldState>();
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      key: _scaffoldKey,
      appBar: 
      AppBar(
        //title: Center(child: Image.asset('assets/images/logo-white.png', fit: BoxFit.cover, width: 125.0,), ),
        title: Center(child: Text('AERONAVES', style: TextStyle(fontFamily: 'Revisal', fontWeight: FontWeight.w200, letterSpacing: 1.0)),),
        backgroundColor: Color(ColorPallete().darkestBlue),
        elevation: 0.0,
        leading: new IconButton(
            //icon: new Icon(Icons.settings),
            icon: Image.asset('assets/images/icon-menu.png', fit: BoxFit.cover, width: 25.0, color: Colors.white),
            onPressed: () => _scaffoldKey.currentState.openDrawer()
        ),
      ),
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
                  },
                ),
              ],
            ),
          )
      ),

      body: Stack(
        children: <Widget>[
           Container(
             child: AircraftsData(),
           )
        ],
      ),

    );
  }
}