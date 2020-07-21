import 'package:flutter/material.dart';
import 'package:url_launcher/url_launcher.dart' as UrlLauncher;

class WhiteAppbar extends StatelessWidget {
  final String phoneNumber;
  final String title;
  WhiteAppbar({this.phoneNumber, this.title});
  @override
  Widget build(BuildContext context) {
    return Container(
          child: Container(
            margin: EdgeInsets.fromLTRB(0.0, 0.0, 0.0, 40.0),
            child: 
            Column(
              children: <Widget>[
                ListTile(
                  leading: Image.asset('assets/images/icon-menu.png', height: 15.0, color: Colors.white),
                  title: Text('${title}', style: TextStyle(color: Colors.black54, fontSize: 18.0, fontFamily: 'Revisal',), textAlign: TextAlign.center,),
                  trailing: IconButton(
                    icon: Image.asset('assets/images/reservar.png', height: 35.0,),
                    onPressed: ()=> UrlLauncher.launch("whatsapp://send?phone=${phoneNumber}&text=Hola%20quiero%20una%20reserva"),
                  ),
                ),
                Divider(height: 1.0, color: Colors.grey,)
              ],
            ),
            color: Colors.white,
            width: MediaQuery.of(context).size.width,
            padding: EdgeInsets.fromLTRB(0.0, 40.0, 0.0, 40.0),
          )
          
         
          //padding: EdgeInsets.symmetric(horizontal: MediaQuery.of(context).size.width),
          //padding: EdgeInsets.all(500.0),
        );
  }
}