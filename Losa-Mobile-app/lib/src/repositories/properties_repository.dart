import '../resources/properties_resource_api.dart';

class PropertiesRepository {

  final propertiesResourceApi = PropertiesResourceApi();

  getProperties() {

    return propertiesResourceApi.getProperties();

  }

}