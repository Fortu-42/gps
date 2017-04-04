  var pubnub = new PubNub({
      publishKey: 'pub-c-ffef9f39-c598-4bfa-a4aa-65874150cd42',
      subscribeKey: 'sub-c-a3e9dcca-eafc-11e6-889b-02ee2ddab7fe'
  });

  function getNonZeroRandomNumber() {
      var random = Math.floor(Math.random() * 199) - 99;
      if (random === 0) return getNonZeroRandomNumber();
      return random;
  }
  var channel = 'BTR-' + getNonZeroRandomNumber();


  setInterval(function() {

      pubnub.publish({
          channel: 'BTR',
          message: [
              { "latlng": [-64.670508, 10.130128] },
              { "latlng": [-64.678958, 10.133553] },
              { "latlng": [-64.679803, 10.133699] },
              { "latlng": [-64.682624, 10.154759] }
          ]
      });

  }, 1000);