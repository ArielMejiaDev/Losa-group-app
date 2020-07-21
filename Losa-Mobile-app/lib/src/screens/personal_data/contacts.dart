import 'package:flutter/material.dart';
import '../../widgets/pallette/colors_pallete.dart';
import '../main_menu.dart';
import '../personal_data/personal_data.dart';
import '../../providers/properties_bloc_provider.dart';
import '../property/property_list.dart';
import '../aircraft/aircrafts_list.dart';

import '../../models/losa_contacts.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;


class Contacts extends StatefulWidget {
  Contacts({Key key}) : super(key: key);
  @override
  _ContactsState createState() => _ContactsState();
}

class _ContactsState extends State<Contacts> {
   final GlobalKey<ScaffoldState> _scaffoldKey = new GlobalKey<ScaffoldState>();


    /* ---------------------------- Future to get API --------------------------- */

Future <List <LosaContacts>> _getLosaContacts() async {
  var url = 'http://23.100.120.18/api/v1/losa-contacts';
  var data = await http.get(url, headers: { "Accept": "application/json", 'api-key' : '\$2y\$10\$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO' });
  var response = json.decode(data.body);
  List <LosaContacts> losaContacts = [];

  for (var aircraftData in response) {
    LosaContacts aircraft = LosaContacts(name: aircraftData['name'], telefono: aircraftData['telefono'], email: aircraftData['email']);
    losaContacts.add(aircraft);
  }

  return losaContacts;
  

}

/* ----------------------------- End Future API ----------------------------- */


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Center(child: Text('CONTACTOS', style: TextStyle(fontFamily: 'Revisal', fontWeight: FontWeight.w200, letterSpacing: 1.0),),),
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
      // ListView(
      //   children: <Widget>[
      //     //Cards
      //     //---------------------------------------------------------------
      //     Card(
      //       margin: EdgeInsets.all(5.0),
      //       elevation: 2.0,
      //       child: 
      //       Container(
      //         padding: EdgeInsets.all(10.0),
      //         child: 
      //           ListTile(
      //             title: Text('John Doe', style: TextStyle(
      //               fontFamily: 'Revisal',
      //               fontSize: 15.0,
      //               fontWeight: FontWeight.w300,
      //               color: Color(ColorPallete().darkestBlue)
      //             ),),
      //             subtitle: Text('50225612492'),
      //             trailing: 
      //               Container(
      //                 child: IconButton(
      //                   icon: Image.asset('assets/images/action-arrow.png', fit: BoxFit.cover,),
      //                   onPressed: (){

      //                   },
      //                 )
      //               ),
      //           ),
      //       )
      //     ),

      //     Card(
      //       margin: EdgeInsets.all(5.0),
      //       elevation: 2.0,
      //       child: 
      //       Container(
      //         padding: EdgeInsets.all(10.0),
      //         child: 
      //           ListTile(
      //             title: Text('Anne Doe', style: TextStyle(
      //               fontFamily: 'Revisal',
      //               fontSize: 15.0,
      //               fontWeight: FontWeight.w300,
      //               color: Color(ColorPallete().darkestBlue)
      //             ),),
      //             subtitle: Text('50224982561'),
      //             trailing: 
      //               Container(
      //                 child: IconButton(
      //                   icon: Image.asset('assets/images/action-arrow.png'),
      //                   onPressed: (){

      //                   },
      //                 )
      //               ),
      //           ),
      //       )
      //     ),

      //     Card(
      //       margin: EdgeInsets.all(5.0),
      //       elevation: 2.0,
      //       child: 
      //       Container(
      //         padding: EdgeInsets.all(10.0),
      //         child: 
      //           ListTile(
      //             title: Text('Mary Doe', style: TextStyle(
      //               fontFamily: 'Revisal',
      //               fontSize: 15.0,
      //               fontWeight: FontWeight.w300,
      //               color: Color(ColorPallete().darkestBlue)
      //             ),),
      //             subtitle: Text('50244259193'),
      //             trailing: 
      //               Container(
      //                 child: IconButton(
      //                   icon: Image.asset('assets/images/action-arrow.png'),
      //                   onPressed: (){

      //                   },
      //                 )
      //               ),
      //           ),
      //       )
      //     ),

      //     Card(
      //       margin: EdgeInsets.all(5.0),
      //       elevation: 2.0,
      //       child: 
      //       Container(
      //         padding: EdgeInsets.all(10.0),
      //         child: 
      //           ListTile(
      //             title: Text('Victor Doe', style: TextStyle(
      //               fontFamily: 'Revisal',
      //               fontSize: 15.0,
      //               fontWeight: FontWeight.w300,
      //               color: Color(ColorPallete().darkestBlue)
      //             ),),
      //             subtitle: Text('5026014472'),
      //             trailing: 
      //               Container(
      //                 child: IconButton(
      //                   icon: Image.asset('assets/images/action-arrow.png'),
      //                   onPressed: (){

      //                   },
      //                 )
      //               ),
      //           ),
      //       )
      //     ),

      //     Card(
      //       margin: EdgeInsets.all(5.0),
      //       elevation: 2.0,
      //       child: 
      //       Container(
      //         padding: EdgeInsets.all(10.0),
      //         child: 
      //           ListTile(
      //             title: Text('David Doe', style: TextStyle(
      //               fontFamily: 'Revisal',
      //               fontSize: 15.0,
      //               fontWeight: FontWeight.w300,
      //               color: Color(ColorPallete().darkestBlue)
      //             ),),
      //             subtitle: Text('50230249572'),
      //             trailing: 
      //               Container(
      //                 child: IconButton(
      //                   icon: Image.asset('assets/images/action-arrow.png'),
      //                   onPressed: (){

      //                   },
      //                 )
      //               ),
      //           ),
      //       )
      //     ),

          

          

      //   //---------------------------------------------------------------
      //   ],
      // )
        FutureBuilder(
        future: _getLosaContacts(),
        builder: (BuildContext context, AsyncSnapshot snapshot) {

          if (snapshot.data == null) {
            return Center(child: CircularProgressIndicator());
          } else {
          

            return ListView.builder(
              itemCount: snapshot.data.length,
              itemBuilder: (BuildContext context, int index){
                return 
                
                
                    Card(
                      margin: EdgeInsets.all(5.0),
                      elevation: 2.0,
                      child: 
                      Container(
                        padding: EdgeInsets.all(10.0),
                        child: 
                          ListTile(
                            title: Text(snapshot.data[index].name.toString(), style: TextStyle(
                              fontFamily: 'Revisal',
                              fontSize: 15.0,
                              fontWeight: FontWeight.w300,
                              color: Color(ColorPallete().darkestBlue)
                            ),),
                            subtitle: Text(snapshot.data[index].email.toString()),
                            trailing: 
                              Container(
                                child: IconButton(
                                  icon: Image.asset('assets/images/action-arrow.png'),
                                  onPressed: (){

                                  },
                                )
                              ),
                          ),
                      ) 
                    );
                
                
                // ListTile(
                //   title: Text(snapshot.data[index].name.toString()), 
                //   subtitle: Text(snapshot.data[index].email.toString()), 
                // );

                
      

              },
            );

          }

        },
      ),
    );

  }
}