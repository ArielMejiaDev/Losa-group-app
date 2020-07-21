import 'package:flutter/material.dart';
import '../pallette/colors_pallete.dart';

class ImageCard extends StatelessWidget {
  
  final String title;
  final String subtitle;
  final backgroundImage;
  final route;

  ImageCard({this.title, this.subtitle, this.backgroundImage, this.route});

  @override
  Widget build(BuildContext context) {
    
    return 
    Card(
      child: 
      Container(
        height: 120.0,
        decoration: BoxDecoration(
          color: Color(ColorPallete().darkestBlue),
          //image: DecorationImage( image: new NetworkImage('${snapshot.data[index]['imageUrlAbsolute']}'),
          image: DecorationImage( image: new NetworkImage(backgroundImage),
          fit: BoxFit.cover,
          colorFilter: new ColorFilter.mode(Colors.black.withOpacity(0.2), BlendMode.dstATop),
          ),
        ),
        child: 
          ListTile(
            title: Text(title, style: TextStyle(color: Colors.white, fontFamily: 'DomaineText', fontSize: 20.0, letterSpacing: 0.80),textAlign: TextAlign.left,),
            subtitle: 
              Container(
                margin: EdgeInsets.only(top: 10.0),
                child: 
                  Text(subtitle, 
                  style: TextStyle(fontFamily: 'Revisal', fontSize: 12.0, fontWeight: FontWeight.w300, color: Colors.white, letterSpacing: 0.92),),
              ),
            contentPadding: EdgeInsets.fromLTRB(40.0, 15.0, 40.0, 15.0),
            trailing: Image.asset('assets/images/arrow.png', height: 20.0,),
            onTap: (){
              //Navigator.push(context, MaterialPageRoute(builder: (BuildContext context) => PropertyMenu(property: snapshot.data[index]),));
              //Navigator.push(context, MaterialPageRoute(builder: (BuildContext context) => PropertyCalendar(property: snapshot.data[index]),));
              Navigator.push(context, MaterialPageRoute(builder: (BuildContext context) => route,));
            },
          ),
      )
    );

  }//Widget

}//Class