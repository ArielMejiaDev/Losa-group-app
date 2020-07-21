import 'package:http/http.dart' show Client;
import 'dart:convert';

class CalendarEventsResourceApi {

  Client client = Client();
  //final url = 'http://198.211.104.209/losa/public/api/v1/events';
  final url = 'http://23.100.120.18/api/v1/events';
  final propertyId;
  CalendarEventsResourceApi({this.propertyId});

  //methods 

  getCalendarEvents() async{
    final response = await client.get('$url/$propertyId', headers: { "Accept": "application/json", 'api-key' : '\$2y\$10\$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO' });
    final parsedJson = json.decode(response.body);
    return parsedJson;

  }

}

