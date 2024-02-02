# Kirby Plugin: Wikipedia

This plugin allows you to shows a summary for a Wikipedia article on your Kirby site.

## Git submodule

```
git submodule add https://github.com/mirthe/kirby_wikipedia.git site/plugins/wikipedia
```
       
## Example

Placed for example with information from the English Wikipedia (default)

    (wikipedia: article: Opeth)

Or to specify a different language

    (wikipedia: article: Opeth lang: nl)

For more ambiguous article names use the spelling from Wikipedia

    (wikipedia: article: Tool_(band))

Spaces are converted to underscores, so you can use

    (wikipedia: article: Type O Negative)

<img width="693" alt="example" src="https://github.com/mirthe/kirby_wikipedia/assets/2444173/94f2da06-99ea-4bfd-97f8-891595605193">    

## Todo

- Offer as an official Kirby plugin
- Add translations for labels
- ..
