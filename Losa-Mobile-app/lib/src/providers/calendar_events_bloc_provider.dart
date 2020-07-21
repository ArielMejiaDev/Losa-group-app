import 'package:flutter/material.dart';
import '../blocs/calendar_events_bloc.dart';

class CalendarEventsBlocProvider extends InheritedWidget {

  //props
  final bloc = CalendarEventsBloc();

  //constructor
  CalendarEventsBlocProvider({Key key, Widget child}): super(key:key, child:child);

  //inheritedWidge must have update
  bool updateShouldNotify(InheritedWidget oldWidget) => true;

  static CalendarEventsBloc of(BuildContext context) {
    return (context.inheritFromWidgetOfExactType(CalendarEventsBlocProvider) as CalendarEventsBlocProvider).bloc;
  }

}