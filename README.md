# Kirby Plugin: Wikipedia

This plugin allows you to shows a summary for a Wikipedia article in your Kirby site.

## Git submodule

```
git submodule add https://github.com/mirthe/kirby_wikipedia.git site/plugins/wikipedia
```
       
## Example

Placed for example with information from the English Wikipedia (default)

    (wikipedia: article: Opeth)

Or to specify a different language

    (wikipedia: article: Opeth lang: nl)

For more ambiguous article names use the spelling from Wikidia

    (wikipedia: article: Tool_(band))

Spaces are converted to underscores, so you can use

    (wikipedia: article: Type O Negative)

## Todo

- Offer as an official Kirby plugin
- Add translations for labels
- ..
