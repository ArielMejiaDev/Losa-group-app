import 'package:rxdart/rxdart.dart';
import '../repositories/calendar_events_repository.dart';

class CalendarEventsBloc {

  //props
  final propertyId;

  //constructors
  CalendarEventsBloc({this.propertyId});


  //final _calendarEventsRepository = CalendarEventsRepository(propertyId: propertyId);
  final _calendarEvents = PublishSubject<Map <String, dynamic>>();

  //add stream
  Observable <Map <String, dynamic>> get calendarEvents => _calendarEvents.stream;

  //output sink
  getCalendarEvents(propertyId) async{
    final calendarEventsRepository = CalendarEventsRepository(propertyId: propertyId);
    final calendarEvents = await calendarEventsRepository.getCalendarEvents(propertyId);
    //print("This are the calendar events: ---------------------------- $propertyId");
    _calendarEvents.sink.add(calendarEvents);

  }

  dispose() {
    _calendarEvents.close();
  }



  //methods




}