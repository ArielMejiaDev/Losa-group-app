import 'package:flutter/material.dart';
import 'property/property_list.dart';
import 'aircraft/aircrafts_list.dart';
import '../widgets/pallette/colors_pallete.dart';

class MainMenu extends StatefulWidget {
  @override
  _MainMenuState createState() => _MainMenuState();
}

class _MainMenuState extends State<MainMenu> {
  int currentTabIndex = 0;
  final List <Widget> tabs = [
    PropertyList(),
    AircraftsList(),
  ];
  //methods
  void onTabTapped(int index) {
    setState(() {
     currentTabIndex = index;
    });
  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: tabs[currentTabIndex],
      bottomNavigationBar: Theme(
        data: Theme.of(context).copyWith(
          canvasColor: Color(ColorPallete().darkestBlue),
          primaryColor: Colors.white,
          textTheme: Theme.of(context).textTheme.copyWith(caption: TextStyle(color: Colors.white54))
        ),
        
        child: BottomNavigationBar(
          onTap: onTabTapped,
          currentIndex: currentTabIndex,
          items: [
            BottomNavigationBarItem(
              icon: Icon(Icons.home),
              title: Text('Propiedades'),
            ),
            BottomNavigationBarItem(
              icon: Icon(Icons.airplanemode_active),
              title: Text('Aeronaves')
            ), 
          ],
        ),
      ),
      
    );
  }
}