import 'package:flutter/material.dart';
import 'property_calendar.dart';
import 'property_detail.dart';
import '../../providers/calendar_events_bloc_provider.dart';

class PropertyMenu extends StatelessWidget {
  final property;
  PropertyMenu({this.property});
  @override
  Widget build(BuildContext context) {
    return DefaultTabController(
      length: 2,
      child: Scaffold(
        appBar: AppBar(
            title: Text('${property['name']}\n ${property['address']}'),
          bottom: TabBar(
            tabs: <Widget>[
              Tab(
                icon: Icon(Icons.today),
                text: 'Calendar',
              ),
              Tab(
                icon: Icon(Icons.info),
                text: 'Info',
              )
            ],
          ),
        ),
        body: 
        TabBarView(
          children: <Widget>[
            CalendarEventsBlocProvider(child: PropertyCalendar(property: property,),),
            PropertyDetail(property: property,)
          ],
        ),
      ),
    );
  }
}
