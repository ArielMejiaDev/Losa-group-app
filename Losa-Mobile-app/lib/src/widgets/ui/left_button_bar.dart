import 'package:flutter/material.dart';
import '../pallette/colors_pallete.dart';

class LeftBtnBar extends StatelessWidget {
  final activeText;
  final alternativeText;
  final alternativeRoute;
  LeftBtnBar({this.activeText, this.alternativeText, this.alternativeRoute});
  @override
  Widget build(BuildContext context) {
    return 
    Center(child: 
      Row(
        mainAxisSize: MainAxisSize.min,
        mainAxisAlignment: MainAxisAlignment.center,
        children: <Widget>[
          
          GestureDetector(child: 
            Container(child: 
              Text(
                activeText,
                textAlign: TextAlign.center,
                style: TextStyle(
                  color: Colors.white,
                  fontSize: 12.0,
                  fontFamily: 'Revisal',
                  fontWeight: FontWeight.w600,
                  letterSpacing: 1.0,
                ),
              ),
              color: Color(ColorPallete().darkBlue),
              padding: EdgeInsets.symmetric(vertical: 10.0),
              margin: EdgeInsets.fromLTRB(0.0, 10.0, 0.0, 0.0),
              width: MediaQuery.of(context).size.width * 0.40,
            ),
            onTap: (){
              //print('hit calendar button');
            },      
          ), 

        GestureDetector( child:
          Container(child: 
            Text(
              alternativeText, 
              textAlign: TextAlign.center,
              style: TextStyle(
                color: Color(ColorPallete().darkBlue),
                fontSize: 12.0,
                fontFamily: 'Revisal',
                fontWeight: FontWeight.w600,
                letterSpacing: 1.0,
              ),
            ),
            color: Color(ColorPallete().lightGrey),
            padding: EdgeInsets.symmetric(vertical: 10.0),
            margin: EdgeInsets.fromLTRB(0.0, 10.0, 0.0, 0.0),
            width: MediaQuery.of(context).size.width * 0.40,
          ),
          onTap: (){
            //Navigator.pushReplacement(context, MaterialPageRoute(builder: (BuildContext context) => PropertyDetail(property: property,) ));
            Navigator.pushReplacement(context, MaterialPageRoute(builder: (BuildContext context) => alternativeRoute ));
          },
        ),

        ],
      ),
    );
  }
}