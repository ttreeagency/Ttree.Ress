# Ttree - Responsive Web Design with Server-Side Component

## Description

Responsive Web Design is really really trendy (and mandatory) today. But in some cases it's not the best solution.

Most responsive website serve exactly the same amount of bits to desktop, tablet or mobile user.
Many mobile user will leave your website if the loading time is to long. Or sometimes your design need a different
markup to support your design decisions.

If you are intersted by this topics, you can read those articles:

* [You May Be Losing Users If Responsive Web Design Is Your Only Mobile Strategy](http://www.smashingmagazine.com/2014/07/22/responsive-web-design-should-not-be-your-only-mobile-strategy/)
* [Improve Mobile Support With Server-Side-Enhanced Responsive Design](http://www.smashingmagazine.com/2013/04/09/improve-mobile-support-with-server-side-enhanced-responsive-design/)
* [RESS: Responsive Design + Server Side Components](http://www.lukew.com/ff/entry.asp?1392)

## What's include in this package ?

This package include the library [MobileDetect](http://mobiledetect.net) and extend the Action Request class with two new methods:

* ActionRequest::isMobile()
* ActionRequest::isTablet()

You can use those methods in your own controller, Fusion prototypes, ...

## No magic everything is configurable

### Tweak a Fusion prototype to change the rendering by device type

```
prototype(Your.Package.CustomElement) < prototype(Neos.Fusion:Case) {
    default {
        condition = ${request.mobile}
        itemRenderer = Your.Package.CustomElementDefault
    }
    default {
        condition = true
        itemRenderer = Your.Package.CustomElementDefault
    }
    
    @cache {
        mode = 'dynamic'
        entryIdentifier {
          node = ${node}
        }
        entryDiscriminator = ${request.mobile : 'mobile' ? 'default'}
        context {
                1 = 'node'
                2 = 'documentNode'
        }
        entryTags {
                1 = ${'Node_' + node.identifier}
        }
    }
}
```

By using the `dynamic` caching mode you don't need to configure the upper cache segments.

### Completly different markup for Mobile, Tablet & Desktop

You can override your `root` Fusion conditions to select different rendering for different type of client:

```
root {
    mobile {
        @position = 'before default'
        condition = ${request.mobile && Configuration.setting('Ttree.Ress.enable.mobile') == true}
        type = 'Your.Package:MobilePage'
    }
    tablet {
        @position = 'before default'
        condition = ${request.tablet && Configuration.setting('Ttree.Ress.enable.tablet') == true}
        type = 'Your.Package:TabletPage'
    }
    @cache {
        entryIdentifier {
            mobile = ${request.mobile && Configuration.setting('Ttree.Ress.enable.mobile') == true ? 'mobile' : ''}
            tablet = ${request.tablet && Configuration.setting('Ttree.Ress.enable.tablet') == true ? 'tablet' : ''}
        }
    }
}
```

In this example the root cache entry identifier are configured correctly for mobile and table cache. Please make sure to configure your
other cache segments correctly.

## Sponsors & Contributors

The development of this package is sponsored by ttree (https://ttree.ch) and techniconcept (https://techniconcept.ch).
