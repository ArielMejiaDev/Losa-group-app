import 'package:flutter/material.dart';
import '../widgets/pallette/colors_pallete.dart';

class MainMenu extends StatefulWidget {
  @override
  _MainMenuState createState() => _MainMenuState();
}

class _MainMenuState extends State<MainMenu> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      drawer: new Drawer(
        child: new Text("\n\n\nDrawer Is Here"),
      ),
      appBar: new AppBar(
        title: Center(child: Image.asset('assets/images/logo-white.png', fit: BoxFit.cover, width: 125.0,), ),
        backgroundColor: Color(ColorPallete().darkestBlue),
        leading: new IconButton(
            icon: new Icon(Icons.settings),
            //onPressed: () => _scaffoldKey.currentState.openDrawer()
        ),
      ),
      body: 
      ListView(
        children: <Widget>[
          Column(
            children: <Widget>[
              // Main navbar
              //-----------------------------------------------------------------
              Container(
                color: Color(ColorPallete().darkestBlue),
                height: MediaQuery.of(context).size.height * 0.40,
                child: 
                Column(
                  children: <Widget>[
                    // SizedBox(height: 10.0,),
                    // ListTile(
                    //   leading: Image.asset('assets/images/icon-menu.png', fit: BoxFit.cover, width: 25.0, color: Colors.white),
                    //   title: Center(child: Image.asset('assets/images/logo-white.png', fit: BoxFit.cover, width: 125.0,), ),
                    // ),
                    SizedBox(height: 100.0,),
                    Row(
                      children: <Widget>[
                        Container(
                          margin: EdgeInsets.only(left: 20.0),
                          child: Text('Bienvenido de nuevo', 
                            style: TextStyle(
                              color: Colors.white,
                              fontFamily: 'Revisal',
                              fontSize: 14.0,
                              fontWeight: FontWeight.w400,
                              letterSpacing: 1.17
                            ),
                          ),
                        ),
                      ],
                    ),
                    SizedBox(height: 10.0,),
                    Row(
                      children: <Widget>[
                        Container(
                          margin: EdgeInsets.only(left: 20.0),
                          child: Text('Este es su resumen de hoy:', 
                            style: TextStyle(
                              color: Colors.blueAccent.shade100,
                              fontFamily: 'Revisal',
                              fontSize: 14.0,
                              fontWeight: FontWeight.w400,
                              letterSpacing: 1.17
                            ),
                          ),
                        ),
                      ],
                    )
                  ],
                ),
                
              ), 
              // CARD
              //-----------------------------------------------------------------

              Container(
                height: 150.0,
                margin: const EdgeInsets.all(15.0),
                padding: const EdgeInsets.all(3.0),
                        decoration: 
                BoxDecoration(
                  border: 
                  Border(
                    top: BorderSide(width: 1.0, color: Color(ColorPallete().borderGrey)),
                    bottom: BorderSide(width: 1.0, color: Color(ColorPallete().borderGrey)),
                    left: BorderSide(width: 1.0, color: Color(ColorPallete().borderGrey)),
                    right: BorderSide(width: 1.0, color: Color(ColorPallete().borderGrey)),
                  ),
                  borderRadius: BorderRadius.circular(5.0)
                ),
                child: 
                Center(
                  child: 
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.center,
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: <Widget>[
                      Icon(Icons.contact_phone, size: 40.0,),
                      SizedBox(height: 15.0,),
                      Text(
                        'Contactos',
                        style: TextStyle(
                          fontFamily: 'DomaineText',
                          fontSize: 18.0,
                          letterSpacing: 1.0
                        ),
                      )
                    ],
                  )
                ),
              ),


              // NEWS
              //-----------------------------------------------------------------

              Container(
                margin: EdgeInsets.fromLTRB(15.0, 10.0, 15.0, 0.0),
                padding: EdgeInsets.fromLTRB(3.0, 3.0, 3.0, 0.0),
                child: 
                Row(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  mainAxisAlignment: MainAxisAlignment.start,
                  children: <Widget>[
                    Text(
                      'Noticias', 
                      style: 
                      TextStyle(
                        fontSize: 16.0,
                        fontFamily: 'DomaineText',
                        letterSpacing: 1.0,
                      ),
                    ),
                  ],
                )
              ),

              
              Container(
              margin: EdgeInsets.fromLTRB(00.0, 0.0, 0.0, 0.0),
              height: 150.0,
              child: ListView(
                scrollDirection: Axis.horizontal,
                children: <Widget>[
                  Container(
                    margin: const EdgeInsets.all(15.0),
                    padding: const EdgeInsets.all(3.0),
                    width: MediaQuery.of(context).size.width * 0.92,
                    decoration: BoxDecoration(
                      color: Color(ColorPallete().lightGrey),
                      borderRadius: BorderRadius.circular(10.0)
                    ),
                    child: 
                    Row(
                      children: <Widget>[
                        SizedBox(width: 20.0,),
                        Text('FECHA'),
                        SizedBox(width: 10.0,),
                        Text('Celebracion aniversario Losa Group')
                      ],
                    ),
                  ),
                  Container(
                    margin: const EdgeInsets.all(15.0),
                    padding: const EdgeInsets.all(3.0),
                    width: MediaQuery.of(context).size.width * 0.92,
                    decoration: BoxDecoration(
                      color: Color(ColorPallete().lightGrey),
                      borderRadius: BorderRadius.circular(10.0)
                    ),
                    child: 
                    Row(
                      children: <Widget>[
                        SizedBox(width: 20.0,),
                        Text('FECHA'),
                        SizedBox(width: 10.0,),
                        Text('Celebracion aniversario Losa Group')
                      ],
                    ),
                  ),
                ],
              ),
            ),


            ],
          ),
        ],
      )
    );
  }
}