import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:flutter_calendar_carousel/flutter_calendar_carousel.dart' show CalendarCarousel;
import 'package:flutter_calendar_carousel/classes/event.dart';
import 'package:flutter_calendar_carousel/classes/event_list.dart';
import '../../widgets/ui/image_appbar.dart';
import '../../widgets/pallette/colors_pallete.dart';

class AircraftCalendar extends StatefulWidget {
  final aircraft;
  AircraftCalendar({Key key, this.aircraft}) : super(key: key);
  @override
  _AircraftCalendarState createState() => new _AircraftCalendarState();
}

class _AircraftCalendarState extends State<AircraftCalendar> {
  DateTime _currentDate = DateTime.now();
  DateTime _currentDate2 = DateTime.now();
  String _currentMonth = '';
  String id;
  final key = 'date';
  final value = 'event';
  
  static Widget _eventIcon = new Container(
    decoration: new BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.all(Radius.circular(1000)),
        border: Border.all(color: Colors.blue, width: 2.0)),
    child: new Icon(
      Icons.people,
      color: Colors.amber,
    ),
  );

  EventList<Event> _markedDateMap = new EventList<Event>(
    events: {},
  );

  Future getData() async {
    //String url = 'http://104.214.71.209/api/v1/aircrafts/events/$id';
    String url = 'http://23.100.120.18/api/v1/aircrafts/events/$id';
    final response = await http.get(url, headers: { "Accept": "application/json", 'api-key' : '\$2y\$10\$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO' });
    var jsonData = json.decode(response.body);
    if (jsonData.length == 0) {
      print('No data');
      return [{
        "date": "2015-12-24",
        "event": [
            {
                "id": "12345678",
                "etag": "12345678",
                "dateStart": "2015·12·25",
                "timeStart": "14:00:00-06:00",
                "dateEnd": "2015·12·25",
                "timeEnd": "23:00:00-06:00"
            }
        ]
    }];
      //showAlertDialog(context, title: 'No hay Registro de Reservas', content: 'Porfavor contactar con información', buttonText: 'Ok');
    } else {
      print('-------API DATA--------');
      print(jsonData);
      return jsonData;
    }
    
  }

  CalendarCarousel _calendarCarousel;

  @override
  void initState() {
    id = widget.aircraft.id.toString();
    getData().then((result) {
      // If we need to rebuild the widget with the resulting data,
      // make sure to use `setState`
      setState(() {
        for(var i = 0; i < result.length; i++) {
          print('--------------------------------------------------------');
          _markedDateMap.add(
            DateTime.parse(result[i][key]),
            new Event(
              date: DateTime.parse(result[i][key]),
              title: result[i][value][0]['etag'],
              dateStart: result[i][value][0]['dateStart'],
              timeStart: result[i][value][0]['timeStart'],
              dateEnd: result[i][value][0]['dateEnd'],
              timeEnd: result[i][value][0]['timeEnd'],
              icon: _eventIcon,
          ));
        }
        print(result[0]['event'][0]['codigo']);
      });
    });

    super.initState();

  }

  @override
  Widget build(BuildContext context) {
    _calendarCarousel = CalendarCarousel<Event>(
      onDayPressed: (DateTime date, List<Event> events) {
        this.setState(() => _currentDate = date);
        _currentDate2 = _currentDate;
        //events.forEach((event) => print(event.title));
        _showModalSheet(events, _currentDate2);
      },
      weekdayTextStyle: TextStyle(color: Color(ColorPallete().softGrey)),
      weekendTextStyle: TextStyle(color: Color(ColorPallete().darkBlue),),
      //thisMonthDayBorderColor: Colors.grey,
      headerTextStyle: TextStyle(color: Color(ColorPallete().darkBlue,), fontFamily: 'DomaineText', fontSize: 15.0, letterSpacing: 0.11, fontWeight: FontWeight.bold),
      weekFormat: MediaQuery.of(context).size.width < MediaQuery.of(context).size.height ? false : true,
      markedDatesMap: _markedDateMap,
      todayTextStyle: TextStyle(color: Color(ColorPallete().darkBlue)),
      todayBorderColor: Color(ColorPallete().darkBlue),
      todayButtonColor: Color(ColorPallete().midGrey),
      height: MediaQuery.of(context).size.height * 0.90,
      selectedDateTime: _currentDate2,
      customGridViewPhysics: NeverScrollableScrollPhysics(),
      selectedDayTextStyle: TextStyle(color: Colors.black),
      selectedDayBorderColor: Colors.transparent,
      selectedDayButtonColor: Color(ColorPallete().midGrey),
      //selectedDayButtonColor: Color(ColorPallete().oldLace),
      markedDateWidget: Container(child: Container(color: Color(ColorPallete().darkBlue), height: 4.0, width: 4.0), padding: EdgeInsets.fromLTRB(4.0, 0.0, 0.0, 4.0),),
      //markedDateShowIcon: true,
      //markedDateIconMaxShown: 1,
      // todayTextStyle: TextStyle(
      //   color: Colors.blue,
      // ),
      // markedDateIconBuilder: (event) {
      //   return event.icon;
      // },
      markedDateMoreShowTotal: false,
      dayButtonColor: Color(ColorPallete().midGrey),
      daysHaveCircularBorder: false,
    );

    if (_markedDateMap.events.isEmpty) {
      return Scaffold(body: 
        Center(
          child: CircularProgressIndicator(),
        ),
      );
    } else {
    
    
      return Scaffold(
      body: 
      SingleChildScrollView(
        child: 
        Stack(
          children: <Widget>[
            ImageAppbar(
              title: widget.aircraft.type,
              subtitle: widget.aircraft.plates,
              iconLink: "whatsapp://send?phone=50231023231&text=Hola%20quiero%20una%20reserva",
              backgroundImage: 'https://images.unsplash.com/photo-1483304528321-0674f0040030?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80',
            ),
              Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.start,
                children: <Widget>[
                  //custom icon
                  Container(
                    margin: EdgeInsets.fromLTRB(16.0, 140.0, 16.0, 0.0),
                    child: Column(
                      children: <Widget>[
                        _calendarCarousel
                      ],
                    ),
                  ),
                ],
              ),
          ],
        ),
      )
        
      );
    }
  }

  void _showModalSheet(events, eventDate) {
    showModalBottomSheet(context: context, builder: (builder) {
      return 
      Container(
        padding: EdgeInsets.fromLTRB(5.0, 20.0, 5.0, 20.0),
        child: 
        Stack(
          children: <Widget>[
            Container(
              margin: EdgeInsets.only(top: 30.0),
              child:             
              ListView.builder(
                shrinkWrap: true,
                itemCount: events.length,
                itemBuilder: (context, int index){
                  return               
                    Card(
                      child: ListTile(
                        leading: CircleAvatar(
                          backgroundColor: Colors.transparent,
                          child: Image.asset('assets/images/bullet.png', height: 10.0, color: Color(ColorPallete().darkBlue),),
                        ),
                        title: Text('${events[index].timeStart.toString()} ${events[index].timeEnd.toString()}'),
                        subtitle: Text('Código de reserva: ${events[index].title.toString()}',),),
                    );
                },
              ),
            ),

            Row(
              crossAxisAlignment: CrossAxisAlignment.center, 
              mainAxisAlignment: MainAxisAlignment.center, 
              children: <Widget>[
                Container(
                  margin: EdgeInsets.only(right: 10.0), 
                  child: 
                    Image.asset('assets/images/calendar.png', 
                    height: 15.0, 
                    color: Color(ColorPallete().darkBlue),)
                ),
                Text(events.length > 0  ?
                  '${eventDate.toString().replaceAll(' 00:00:00.000', '')}' : 'No hay reservas', 
                  textAlign: TextAlign.center,
                  style: TextStyle(
                    fontSize: 16.0,
                    fontFamily: 'DomaineText',
                    color: Color(ColorPallete().darkBlue),
                    fontWeight: FontWeight.bold
                  ),
                ),
                Container(margin: EdgeInsets.only(left: 10.0),child: Image.asset('assets/images/arrow-down.png', color: Color(ColorPallete().darkBlue), height: 10.0,),)
              ],
            )
          ],
        ),
          
      );
    });
  }

}