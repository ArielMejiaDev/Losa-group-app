import 'package:flutter/material.dart';
import '../widgets/pallette/colors_pallete.dart';
import '../providers/properties_bloc_provider.dart';
import '../screens/property/property_list.dart';
import '../screens/aircraft/aircrafts_list.dart';
import '../screens/personal_data/personal_data.dart';
import '../screens/personal_data/contacts.dart';
import '../models/newsItem.dart';
import '../widgets/ui/shortlinks.dart';

//libs for requests
import 'package:http/http.dart' as http;
import 'dart:convert';

class MainMenu extends StatefulWidget {
  //final String userId;
  MainMenu({Key key}) : super(key: key);
  _MainMenuState createState() => _MainMenuState();
}

class _MainMenuState extends State<MainMenu> {
  final GlobalKey<ScaffoldState> _scaffoldKey = new GlobalKey<ScaffoldState>();
  String username;

  Future getData() async {
    //String url = 'http://104.214.71.209/api/v1/aircrafts/events/$id';
    String url = 'http://23.100.120.18/api/v1/home-details/1';
    final response = await http.get(url, headers: { "Accept": "application/json", 'api-key' : '\$2y\$10\$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO' });
    var jsonData = json.decode(response.body);
    if (jsonData.length == 0) {
      print('No data');
      //showAlertDialog(context, title: 'No hay Registro de Reservas', content: 'Porfavor contactar con información', buttonText: 'Ok');
    } else {
      //print('-------API DATA--------');
      //print(jsonData);
      return jsonData;
    }
    
  }

  Future <List <NewsItem>> _getNews() async {
    String url = 'http://192.168.0.2/losa/public/api/v1/home-details/1';
    final data = await http.get(url, headers: { "Accept": "application/json", 'api-key' : '\$2y\$10\$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO' });
    var response = json.decode(data.body);
    List <NewsItem> todayNews = [];
    for (var newItemData in response['news']) {
      NewsItem newItem = NewsItem(title: newItemData['title'], day: newItemData['day'], month: newItemData['month']);
      todayNews.add(newItem);
    }
    return todayNews;
  }

  void initState() {

    getData().then((result) {
      // If we need to rebuild the widget with the resulting data,
      // make sure to use `setState`
      setState(() {
        //get the user data and news
        username = result['name'];
        //get today news
        
      // for (var todayNewsData in result['news']) {
      //   NewsItem newItem = NewsItem(title: todayNewsData['title'], day: todayNewsData['day'], month: todayNewsData['month']);
      //   todayNews.add(newItem);
      // }
        //print(todayNews.length);
      });
    });
    super.initState();
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      //Drawer
      //-------------------------------------------------------------------------
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
      //-------------------------------------------------------------------------
      //Appbar
      //-------------------------------------------------------------------------
      appBar: 
      AppBar(
        title: Center(child: Image.asset('assets/images/logo-white.png', fit: BoxFit.cover, width: 125.0,), ),
        backgroundColor: Color(ColorPallete().darkestBlue),
        elevation: 0.0,
        leading: new IconButton(
            //icon: new Icon(Icons.settings),
            icon: Image.asset('assets/images/icon-menu.png', fit: BoxFit.cover, width: 25.0, color: Colors.white),
            onPressed: () => _scaffoldKey.currentState.openDrawer()
        ),
      ),
      //-------------------------------------------------------------------------

      //Body
      //-------------------------------------------------------------------------
      body: 
      ListView(
        children: 
        <Widget>[
          Column(
            children: <Widget>[
              // Main navbar
              //-------------------------------------------------------------------------
              Container(
                color: Color(ColorPallete().darkestBlue),
                height: MediaQuery.of(context).size.height * 0.25,
                child: 
                Column(
                  children: <Widget>[
                    SizedBox(height: 100.0,),
                    Row(
                      children: <Widget>[
                        Container(
                          margin: EdgeInsets.only(left: 20.0),
                          child: Text('Bienvenido de nuevo ${username}.', 
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
                  ],
                ),
                
              ), 
              //-------------------------------------------------------------------------

              // CARD
              //-------------------------------------------------------------------------

              Shortlinks(),

              //-------------------------------------------------------------------------


              // NEWS
              //-----------------------------------------------------------------

              Container(
                margin: EdgeInsets.fromLTRB(15.0, 10.0, 15.0, 0.0),
                padding: EdgeInsets.fromLTRB(3.0, 3.0, 3.0, 0.0),
                color: Colors.white,
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
              )

            ],
          ),

          Container(
            margin: EdgeInsets.symmetric(vertical: 20.0),
            height: 100.0,
            color: Colors.white,
            child: FutureBuilder(
              future: _getNews(),
              builder: (BuildContext context, AsyncSnapshot snapshot) {
                if (snapshot.data == null) {
                  return Center(child: CircularProgressIndicator());
                } else {
                  return 
                  ListView.builder(
                    scrollDirection: Axis.horizontal,
                    shrinkWrap: true,
                    physics: const ClampingScrollPhysics(),
                    itemCount: snapshot.data.length,
                    itemBuilder: (BuildContext context, int index){
                      return
                      Container(
                        margin: const EdgeInsets.fromLTRB(15.0, 5.0, 5.0, 10.0),
                        padding: const EdgeInsets.fromLTRB(15.0, 5.0, 15.0, 5.0),
                        width: MediaQuery.of(context).size.width * 0.72,
                        decoration: BoxDecoration(
                          color: Color(ColorPallete().lightGrey),
                          borderRadius: BorderRadius.circular(10.0)
                        ),
                        child: 
                        Row(
                          children: <Widget>[
                            Column(
                              mainAxisAlignment: MainAxisAlignment.center,
                              children: <Widget>[
                                Text(snapshot.data[index].month.toString(), style: TextStyle(fontFamily: 'Revisal', fontSize: 16.0, fontWeight: FontWeight.w300, color: Color(ColorPallete().darkestBlue)),),
                                Text(snapshot.data[index].day.toString(), style: TextStyle(fontFamily: 'Revisal', fontSize: 25.0, fontWeight: FontWeight.w800, color: Color(ColorPallete().darkestBlue))),
                              ],
                            ),
                            SizedBox(width: 10.0,),
                            Text('/', style: TextStyle(fontSize: 40.0, color: Color(ColorPallete().darkestBlue)),),
                            SizedBox(width: 10.0,),
                            Flexible(
                              child: Column(
                                crossAxisAlignment: CrossAxisAlignment.center,
                                mainAxisAlignment: MainAxisAlignment.center,
                                children: <Widget>[
                                  Text(snapshot.data[index].title.toString(), style: TextStyle(fontFamily: 'Revisal', fontSize: 12.0, letterSpacing: 0.30, fontWeight: FontWeight.w300, color: Color(ColorPallete().darkestBlue)),)
                                ],
                              ),
                            ),
                          ],
                        ),
                      );
                    },
                  );
                }
              },
            ),
          )
        ],
      ),
    );  
  }
}