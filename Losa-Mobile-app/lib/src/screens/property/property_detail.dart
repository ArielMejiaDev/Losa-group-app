import 'package:flutter/material.dart';
import '../../widgets/pallette/colors_pallete.dart';
import 'package:url_launcher/url_launcher.dart' as UrlLauncher;
import '../../widgets/ui/image_appbar.dart';
import '../../widgets/ui/right_button_bar.dart';
import 'property_calendar.dart';

class PropertyDetail extends StatelessWidget {
  //props 
  final property;
  //constructor 
  PropertyDetail({this.property});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      //appBar: AppBar(title: Text('property'),),
      body: 
      Stack(
        children: <Widget>[
          ImageAppbar(
            title: property['name'], 
            subtitle: property['name'], 
            iconLink: "whatsapp://send?phone=${property['infoPhone']}&text=Hola%20quiero%20una%20reserva", 
            backgroundImage: property['imageUrlAbsolute'],
          ),
          Container(
            margin: EdgeInsets.only(top: 138.0),
            child: 
            ListView(
              children: <Widget>[
                RightBtnBar(activeText: '+INFO', alternativeText: 'CALENDARIO', alternativeRoute: PropertyCalendar(property: property,),),
                SizedBox(height: 20.0,),
                _buildHouseTitle(),
                _buildParkingTile(),
                _buildRoomsTile(),
                _buildWifiTile(),
                _buildMaintenancePhone(),
                _buildReceptionPhone()
              ],
            ),
          )
        ],
      ),
      

    );
  }

  //build widgets
  Widget _buildHouseTitle() {
    return Card(
      elevation: 0.1,
      child: ListTile(
        contentPadding: EdgeInsets.all(15.0),
        leading: 
        Image.asset(
          'assets/images/location.png',
          width: 30.0,
        ),
        title: Text('Ver ubicación', style: TextStyle(color: Color(ColorPallete().darkBlue), fontSize: 16.0)),
        trailing: IconButton(
          icon: Image.asset('assets/images/action-arrow.png'),
          onPressed: () => UrlLauncher.launch('${property['mapsLink']}'),
        ),
      ),
    );
  }

  Widget _buildParkingTile() {
    return Card(
      elevation: 0.1,
      child: ListTile(
        contentPadding: EdgeInsets.all(15.0),
        leading: Image.asset(
          'assets/images/parking.png',
          width: 30.0,
        ),
        title: Text('${property['parking'].toString()} parqueo(s)', style: TextStyle(color: Color(ColorPallete().darkBlue), fontSize: 16.0),),
      ),
    );
  }

  Widget _buildRoomsTile() {

    return Card(
      elevation: 0.1,
      child: ListTile(
        contentPadding: EdgeInsets.all(15.0),
        leading: 
        Image.asset(
          'assets/images/beds.png',
          width: 30.0,
        ),
        title: Text('${property['rooms'].toString()} habitacion(es)'),
        subtitle: Text('número de cama(s): ${property['beds'].toString()}') ,
      ),
    );

  }

  Widget _buildWifiTile() {

    return Card(
      elevation: 0.1,
      child: ListTile(
        contentPadding: EdgeInsets.all(15.0),
        leading: 
        Image.asset(
          'assets/images/wifi.png',
          width: 30.0,
        ),
        title: Text('Nombre de la red wifi: ${property['wifiNetwork']}'),
        subtitle: Text('Password: ${property['wifiPassword']}'),
      ),
    );

  }

  Widget _buildMaintenancePhone() {

    return Card(
      elevation: 0.1,
      child: ListTile(
        contentPadding: EdgeInsets.all(15.0),
        leading: 
        Image.asset(
          'assets/images/maintenance.png',
          width: 30.0,
        ),
        title: Text('Empleado(a): ${property['maintenancePerson']}'),
        subtitle: Text('Telefono: ${property['maintenancePhone']}'),
        trailing: IconButton(
          icon: Image.asset('assets/images/action-arrow.png'),
          onPressed: () => UrlLauncher.launch("tel://${property['maintenancePhone']}")
        ),
      ),
    );

  }


  Widget _buildReceptionPhone() {

    return Card(
      elevation: 0.1,
      child: ListTile(
        contentPadding: EdgeInsets.all(15.0),
        leading: 
        Image.asset(
          'assets/images/reception.png',
          width: 30.0,
        ),
        title: Text('Teléfono de recepción'),
        subtitle: Text('Telefono: ${property['receptionPhone']}'),
        trailing: IconButton(
          icon: Image.asset('assets/images/action-arrow.png'),
          onPressed: () => UrlLauncher.launch("tel://${property['receptionPhone']}")
        ),
      ),
    );

  }




}