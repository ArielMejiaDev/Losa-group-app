import 'package:flutter/material.dart';
import '../pallette/colors_pallete.dart';
import 'package:url_launcher/url_launcher.dart' as UrlLauncher;

class ImageAppbar extends StatelessWidget {
  final title;
  final subtitle;
  final iconLink;
  final backgroundImage;
  ImageAppbar({this.title, this.subtitle, this.iconLink, this.backgroundImage});
  @override
  Widget build(BuildContext context) {
    return 
    Container(
      color: Color(ColorPallete().darkBlue),
      height: 140.0,
      width: MediaQuery.of(context).size.width,
      child: 
      Container(
        decoration: BoxDecoration(
          color: Color(ColorPallete().darkestBlue),
          image: DecorationImage( image: new NetworkImage(backgroundImage),
          fit: BoxFit.cover,
          colorFilter: new ColorFilter.mode(Colors.black.withOpacity(0.2), BlendMode.dstATop),
          ),
        ),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: <Widget>[
            ListTile(
              leading: IconButton(icon: Image.asset('assets/images/back-arrow.png', width: 20.0,), onPressed: (){ 
                Navigator.pop(context);
                //Navigator.pushReplacement(context, MaterialPageRoute(builder: (BuildContext context) => PropertiesBlocProvider(child: MainMenu(),))); 
              },), 
              trailing: 
                IconButton(
                  icon: Image.asset('assets/images/reservar.png', height: 35.0, color: Colors.white, fit: BoxFit.cover,),
                  onPressed: () => UrlLauncher.launch(iconLink),
                ),
            ),
            SizedBox(height: 5.0,),
            Container(child: Text(title, style: TextStyle(color: Colors.white, fontSize: 20.0, fontFamily: 'DomaineText'),textAlign: TextAlign.left,), padding: EdgeInsets.fromLTRB(25.0, 0.0, 0.0, 0.0),),
            SizedBox(height: 1.0,),
            Container(child: Text(subtitle, style: TextStyle(color: Colors.white, fontFamily: 'Revisal', fontWeight: FontWeight.w300, fontSize: 12.0),), padding: EdgeInsets.fromLTRB(25.0, 0.0, 0.0, 0.0)),
            //Divider(height: 1.0, color: Colors.grey,)
          ],
        ),
        //color: Color(ColorPallete().darkBlue),
        //width: MediaQuery.of(context).size.width,
        padding: EdgeInsets.fromLTRB(1.0, 25.0, 25.0, 1.0),
      ),
    );
  }
}