TC-Quest-Tracker
================

Quest Tracker is a tool for [TrinityCore](https://github.com/TrinityCore/TrinityCore) that tracks most abandoned quests [(see details)](https://github.com/TrinityCore/TrinityCore/pull/13353) and this is a web interface to show them.

You need to enable your Quest Tracker in your **worldserver.conf** file by setting:

```
Quests.EnableQuestTracker = 1
```

To install the web interface, go in your web server folder and type:

```
git clone https://github.com/ShinDarth/TC-Quest-Tracker.git
```

then open the **TC-Quest-Tracker** folder, copy the file **config.php.dist**, rename the copy to **config.php** and edit it properly (it's quite commented).
