import 'package:flutter/material.dart';
import '../pallette/colors_pallete.dart';
import '../../screens/personal_data/contacts.dart';
import '../../screens/personal_data/personal_data.dart';
import '../../providers/properties_bloc_provider.dart';
import '../../screens/property/property_list.dart';
import '../../screens/aircraft/aircrafts_list.dart';

class Shortlinks extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return
    Container(
      height: MediaQuery.of(context).size.height * 0.45,
      //color: Color(ColorPallete().midGrey),
      color: Colors.white,
      child: 
      Column(
        mainAxisAlignment: MainAxisAlignment.center,
        crossAxisAlignment: CrossAxisAlignment.center,
        children: <Widget>[
          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: <Widget>[
              Container(
                width: MediaQuery.of(context).size.width * 0.49,
                height: MediaQuery.of(context).size.height * 0.20,
                color: Colors.white,
                child: 
                GestureDetector(
                  child: 
                  Card(
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(5.0),
                      side: BorderSide(
                        width: 1.0,
                        color: Color(ColorPallete().softGrey)
                      )
                    ),
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: <Widget>[
                        Image.asset('assets/images/contacto.png', color: Color(ColorPallete().darkestBlue), height: 26.0,),
                        SizedBox(height: 10.0,),
                        Center(child: Text('Contacto', style: TextStyle(fontFamily: 'DomaineText', fontSize: 16.0, letterSpacing: 0.65, color: Color(ColorPallete().darkestBlue))),),
                      ],
                    )
                  ),
                  onTap: (){
                    Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context) => Contacts()));
                  },
                )
              ),
              Container(
                color: Colors.white,
                width: MediaQuery.of(context).size.width * 0.49,
                height: MediaQuery.of(context).size.height * 0.20,
                child: 
                GestureDetector(
                  child: 
                  Card(
                    shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(5.0),
                      side: BorderSide(
                        width: 1.0,
                        color: Color(ColorPallete().softGrey)
                      )
                    ),
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: <Widget>[
                        Image.asset('assets/images/datos-personales.png', color: Color(ColorPallete().darkestBlue), height: 26.0,),
                        SizedBox(height: 10.0,),
                        Center(child: Text('Datos personales', style: TextStyle(fontFamily: 'DomaineText', fontSize: 16.0, letterSpacing: 0.65, color: Color(ColorPallete().darkestBlue))),),
                      ],
                    )
                  ),
                  onTap: () {
                    Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context) => PersonalData()));
                  },
                )
              )
            ],
          ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: <Widget>[
                Container(
                  color: Colors.white,
                  width: MediaQuery.of(context).size.width * 0.49,
                  height: MediaQuery.of(context).size.height * 0.20,
                  child: 
                  GestureDetector(
                    child: 
                    Card(
                      shape: 
                      RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(5.0),
                        side: BorderSide(
                          width: 1.0,
                          color: Color(ColorPallete().softGrey)
                        )
                      ),
                      child: 
                      Column(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Image.asset('assets/images/propiedades.png', color: Color(ColorPallete().darkestBlue), height: 26.0,),
                          SizedBox(height: 10.0,),
                          Center(child: Text('Propiedades', style: TextStyle(fontFamily: 'DomaineText', fontSize: 16.0, letterSpacing: 0.65, color: Color(ColorPallete().darkestBlue))),),
                        ],
                      )
                    ),
                    onTap: (){
                      Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context) => PropertiesBlocProvider(child: PropertyList(),)));
                    },
                  )
                ),
                Container(
                  color: Colors.white,
                  width: MediaQuery.of(context).size.width * 0.49,
                  height: MediaQuery.of(context).size.height * 0.20,
                  child: 
                  GestureDetector(
                    child: 
                    Card(
                      shape: 
                      RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(5.0),
                        side: BorderSide(
                          width: 1.0,
                          color: Color(ColorPallete().softGrey)
                        )
                      ),
                      child: 
                      Column(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          Image.asset('assets/images/aeronaves.png', color: Color(ColorPallete().darkestBlue), height: 26.0,),
                          SizedBox(height: 10.0,),
                          Center(child: Text('Aeronaves', style: TextStyle(fontFamily: 'DomaineText', fontSize: 16.0, letterSpacing: 0.65, color: Color(ColorPallete().darkestBlue))),),
                        ],
                      )
                    ),
                    onTap: (){
                      Navigator.of(context).push(MaterialPageRoute(builder: (BuildContext context) => AircraftsList()));
                    },
                  )
                )
              ],
            ),
        ],
      )
    );
  }
}