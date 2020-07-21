import '../resources/calendar_events_resource_api.dart';

class CalendarEventsRepository {

  final propertyId;
  CalendarEventsRepository({this.propertyId});

  getCalendarEvents(propertyId) {

    final calendarEventsResourceApi = CalendarEventsResourceApi(propertyId: propertyId);
    
    return calendarEventsResourceApi.getCalendarEvents();
    
  }

}