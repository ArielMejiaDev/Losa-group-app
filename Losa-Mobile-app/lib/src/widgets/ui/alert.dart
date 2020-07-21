import 'package:flutter/material.dart';

showAlertDialog(BuildContext context, {title, content, buttonText}) {
  // set up the buttons
  Widget cancelButton = FlatButton(
    child: buttonText != null ? Text('$buttonText') : Text("Cancel"),
    onPressed:  () {
      Navigator.of(context).pop();
    },
  );

  // set up the AlertDialog
  AlertDialog alert = AlertDialog(
    title: title != null ? Text('$title') : Text(''),
    content: content!= null ? Text('$content') : Text(''),
    actions: [
      cancelButton,
    ],
  );

  // show the dialog
  showDialog(
    context: context,
    builder: (BuildContext context) {
      return alert;
    },
  );

}