import 'package:flutter/material.dart';
import '../../widgets/pallette/colors_pallete.dart';
import '../main_menu.dart';
import '../personal_data/personal_data.dart';

import '../aircraft/aircrafts_list.dart';
import '../personal_data/contacts.dart';

import '../../providers/properties_bloc_provider.dart';
import '../../blocs/properties_bloc.dart';
import 'property_calendar.dart';
import '../../widgets/ui/image_card.dart';
import 'package:url_launcher/url_launcher.dart' as UrlLauncher;


class PropertyList extends StatefulWidget {
  @override
  _PropertyListState createState() => _PropertyListState();
}

class _PropertyListState extends State<PropertyList> {
  final GlobalKey<ScaffoldState> _scaffoldKey = new GlobalKey<ScaffoldState>();
  @override
  Widget build(BuildContext context) {
    final bloc = PropertiesBlocProvider.of(context);
    final phoneNumber = '50257049742'; 
    bloc.getProperties();
    return Scaffold(
      //-------------------------------------------------------------------------
      //Key
      //-------------------------------------------------------------------------
      key: _scaffoldKey,

      //-------------------------------------------------------------------------
      //Appbar
      //-------------------------------------------------------------------------
      appBar: 
      AppBar(
        title: Center(child: Text('PROPIEDADES', style: TextStyle(fontFamily: 'Revisal', fontWeight: FontWeight.w200, letterSpacing: 1.0),),),
        backgroundColor: Color(ColorPallete().darkestBlue),
        elevation: 0.0,
        leading: new IconButton(
            //icon: new Icon(Icons.settings),
            icon: Image.asset('assets/images/icon-menu.png', fit: BoxFit.cover, width: 25.0, color: Colors.white),
            onPressed: () => _scaffoldKey.currentState.openDrawer()
        ),
        actions: <Widget>[
          IconButton(
            icon: Image.asset('assets/images/reservar-white.png'),
            onPressed: () {
              UrlLauncher.launch("whatsapp://send?phone=${phoneNumber}&text=Hola%20quiero%20una%20reserva");
            },
          ),
        ],
      ),
      //-------------------------------------------------------------------------
      //Drawer
      //-------------------------------------------------------------------------
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
      //-------------------------------------------------------------------------
      //Body
      //-------------------------------------------------------------------------
      body: 
      Stack(
        children: <Widget>[
          //WhiteAppbar(phoneNumber: '50257049742', title: 'PROPIEDADES',),
          Container(
            child: _propertyList(bloc),
          )
        ],
      ),

    );
  }


  //-------------------------------------------------------------------------
  //PropertyList method to get properties from stream and loop it into cards
  //-------------------------------------------------------------------------
  Widget _propertyList(PropertiesBloc bloc) {
    return StreamBuilder(
      stream: bloc.properties,
      builder: (context, snapshot) {
        if (snapshot.hasData) {
          return ListView.builder(
            itemCount: snapshot.data.length,
            itemBuilder: (context, int index) {
              return ImageCard(
                title: '${snapshot.data[index]['name']}', 
                subtitle: '${snapshot.data[index]['address']}', 
                backgroundImage:'${snapshot.data[index]['imageUrlAbsolute']}',
                route: PropertyCalendar(property: snapshot.data[index]),
              );
            },
          );
        } else {
          return Center(child: CircularProgressIndicator(),);
        }
      },
    );
  }



}



// class PropertyList extends StatelessWidget {
//   @override
//   Widget build(BuildContext context) {
//     final bloc = PropertiesBlocProvider.of(context);
//     bloc.getProperties();
//     return Scaffold(
//       //appBar: AppBar(title: Text('Losa'),),
//       body: Stack(
//         children: <Widget>[
//           //WhiteAppbar(phoneNumber: '50257049742', title: 'PROPIEDADES',),
//            Container(
//              margin: EdgeInsets.fromLTRB(0.0, 98.0, 0.0, 0.0),
//              child: _propertyList(bloc),
//            )
//         ],
//       ),
//     );
//   }

//   Widget _propertyList(PropertiesBloc bloc) {
//     return StreamBuilder(
//       stream: bloc.properties,
//       builder: (context, snapshot) {
//         if (snapshot.hasData) {
//           return ListView.builder(
//             itemCount: snapshot.data.length,
//             itemBuilder: (context, int index) {
//               return ImageCard(
//                 title: '${snapshot.data[index]['name']}', 
//                 subtitle: '${snapshot.data[index]['address']}', 
//                 backgroundImage:'${snapshot.data[index]['imageUrlAbsolute']}',
//                 route: PropertyCalendar(property: snapshot.data[index]),
//               );
//             },
//           );
//         } else {
//           return Center(child: CircularProgressIndicator(),);
//         }
//       },
//     );
//   }
// }