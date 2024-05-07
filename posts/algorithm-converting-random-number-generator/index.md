---
title: "A Simple Algorithm for Converting Random Number Generator Outputs to Universal Distributions to Aid Teaching and Research in Modern Physical Chemistry"
## https://quarto.org/docs/journals/authors.html
#author:
#  - name: ""
#    affiliations:
#     - name: ""
#license:
#  text: "©2023 American Chemical Society and Division of Chemical Education, Inc."
license: "CC BY-NC-ND"
#draft: true
#date-modified:
date: 2024-05-07
categories: [article, computational, stat-mech]
keywords: physical chemistry teaching, physical chemistry education, teaching resources, random number, random number generation, universal distribution shapes, probability density function, cumulative distribution function, statistical mechanics, physical chemistry education, Monte Carlo method, inverse transform sampling

image: rnc.png
---
<img src="rnc.png" width="40%" align="right"/>

Molecules and materials often display distributed heterogeneous properties. Modeling the behavior of a single molecule with these properties (e.g. via Monte-Carlo simulations) requires a rapid way to sample distributions of interest and describe how they evolve. Here, we pedagogically introduce a simple algorithm that converts evenly distributed random number generator outputs to any defined probability density function (PDF) called the Random Number Converter (RNC). We demonstrate a numerical approach to obtain cumulative distribution functions (CDFs) and utilize a binary search algorithm to circumvent the need for analytical inverse CDFs. This simple method is demonstrated for various distributions, including single-exponential and Gaussian distributions and non-standard PDFs, for which neither the CDF nor its inverse are analytically solvable. We then apply this algorithm to the rate analysis of catalytic turnover cycles and Fourier spectroscopy, enabling the study of complex reaction kinetics and retrospective interferometry analysis. Our algorithm and examples can be used to train undergraduates on the tools that underlay Monte Carlo methods and connect physical chemistry to standard computer science and statistics. We provide a MATLAB and Python module in the Supporting Information with customizable parameters.


# Reference

Li B (Yangtao), Duong T, Neuhauser D, Alexandrova AN, Caram JR., ChemRxiv. 2024; [doi:10.26434/chemrxiv-2024-4thlz](https://doi.org/doi:10.26434/chemrxiv-2024-4thlz) This content is a preprint and has not been peer-reviewed.

