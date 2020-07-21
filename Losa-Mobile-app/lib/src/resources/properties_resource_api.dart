import 'package:http/http.dart' show Client;
import 'dart:convert';

class PropertiesResourceApi {

  //props 
  Client client = Client();
  //final url = 'http://104.214.71.209/api/v1/properties';
  final url = 'http://23.100.120.18/api/v1/properties';

  //methods 

  getProperties() async {

    final response = await client.get(url, headers: { "Accept": "application/json", 'api-key' : '\$2y\$10\$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO' });
    final parsedJson = json.decode(response.body);
    //return Property.fromApi(parsedJson);
    return parsedJson;
  }

}