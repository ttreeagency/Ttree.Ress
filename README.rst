========================================================
Ttree - Responsive Web Design with Server-Side Component
========================================================

Description
===========

Responsive Web Design is really really trendy today. But in many case it's not the best solution. Most responsive website
serve exactly the same amount of bits to desktop, tablet or mobile user. Many mobile user will leave your website if the
loading time is to long.

If you are intersted by this topics, you can read those articles:

* "You May Be Losing Users If Responsive Web Design Is Your Only Mobile Strategy" (SmashingMagazine01_)
* "Improve Mobile Support With Server-Side-Enhanced Responsive Design" (SmashingMagazine02_)
* "RESS: Responsive Design + Server Side Components" (Lukew01_)

What's include in this package ?
================================

This package include the library MobileDetect_ and extend the Action Request class with two new methods:

* ActionRequest::isMobile()
* ActionRequest::isTablet()

You can use those methods in your own controller, typoscripts implementation classes, ...

But theirs more magic, the root TypoScript setup is extended to allow different rendering pipeline based on the device
of the user. You can enable mobile and tablet support in the package settings.

By default Neos render the TypoScript path "/page", if you enable mobile or tablet support, the rendering path are:

* "/mobile/page" for Mobile device
* "/tablet/page" for Tablet device

If you use specific layout per page, the rendering path are:

* "/mobile/page/[layout]" for Mobile device
* "/tablet/page/[layout]" for Tablet device

By default the root cache entry identifier is configured correctly for mobile and table cache.

Advanced Usage
==============

Change the template of a specific TypoScript object
---------------------------------------------------

TODO

.. _SmashingMagazine01: http://www.smashingmagazine.com/2014/07/22/responsive-web-design-should-not-be-your-only-mobile-strategy/
.. _SmashingMagazine02: http://www.smashingmagazine.com/2013/04/09/improve-mobile-support-with-server-side-enhanced-responsive-design/
.. _Lukew01: http://www.lukew.com/ff/entry.asp?1392
.. _MobileDetect: http://mobiledetect.net/