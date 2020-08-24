# Lessons Learned Wrangling Buphalo
By a Greenhorn Ranch Hand. Narrated by Sam Elliott.

If this is your first rodeo wrangling Buphalo, then hopefully you can learn from my mistakes. This document will be updated further with more lessons as we all learn more about the mysterious Buphalo.

## Troubleshooting
The Buphalo is a unique beast. Its only known to live 'round these parts. If you get cornered by an angry Buphalo, unfortunately, Google will not be able help. However, there are a couple people who can lend a hand. The code owners, Jacques and Brad, are said to have tamed the first wild Buphalo. These two know everything there is to know about this magnificent creature. They can help you out.

## Fabrication
Perhaps the most well known feature of Buphalo, is their ability to produce patterns from fabrication files. A Buphalo should be given a carefully named fabrication file from a carefully named path. If the path contains directories or fabrication files that aren't named well, the Buphalo will produce some weirdly named actors. If this happens, don't worry; no use crying over spilt Buphalo milk. Just rename the fabrication files and directories in the path, and get back on that horse. If you are moving generated actors from `fab` to `src`, you will need to delete them from `src`. Here are some examples:

### Bad Example
Path: `src/V1/SIWA/SignInWithAppleTokenResponse.buphalo.v1.fabrication.yml`

Resulting actor: `V1SIWASignInWithAppleTokenResponse`

### Good Example
Path: `src/V1/SignInWithApple/TokenResponse.buphalo.v1.fabrication.yml`

Resulting actor: `V1SignInWithAppleTokenResponse`

## Annotation Processing
Now, AnnotationProcessing is a beautiful feature of Buphalo, but mind the horns. When handling a Buphalo's AnnotationProcessing, there are two things you need to remember:

1. Annotation processing requires the ending comment token (`*/`) to be on a new line. Single line annotations do not work.
2. Annotations cannot be reused. They can only be used exactly once in a template.

This may change as Buphalo are further domesticated.