


var pubnub = new PubNub({
    publishKey: 'pub-c-ae2645a4-40ac-490b-bc15-0cbb101ec051',
    subscribeKey: 'sub-c-b1668962-e36c-11e6-ac69-0619f8945a4f'
});


eon.chart({
  channels: ['eon-spline'],
  history: true,
  flow: true,
  pubnub: pubnub,
  generate: {
    bindto: '#chart',
    data: {
      labels: true
    }
  }
});