# Armadillo workflow
# Created on 2011-09-21 17:09:57
Object
#
#Wed Sep 21 17:09:57 EDT 2011
Name=Alignment
outputType=Alignment
colorMode=GREEN
y=380.0
editorClass=editors.OutputEditor
OutputAlignment=True
x=608.0
ParentID=Muscle_908013870
properties_id=225
Status=404
ObjectID=Alignment_2108053751
defaultColor=GREEN
output_alignment_id=53
Object=
Connector1Output=True
Description=Muscle (2011-09-21 17\:09\:09)
ObjectType=Output
StatusString=No Class is set to run...
Order=7

Object
#
#Wed Sep 21 17:09:57 EDT 2011
Name=Alignment
outputType=Alignment
colorMode=GREEN
y=183.0
editorClass=editors.OutputEditor
OutputAlignment=True
x=549.0
ParentID=Muscle_908013870
properties_id=226
ObjectID=Alignment_2108053752
defaultColor=GREEN
output_alignment_id=0
Object=
Connector1Output=True
Description=Muscle (2010-09-10 11\:28\:35)
ObjectType=Output
Order=6

Object
#
#Wed Sep 21 17:09:57 EDT 2011
nbInput=0
Connector0Conditional=True
ClassName=Not Set
Name=Informations
Connector1Conditional=True
colorMode=ORANGE
NoThread=false
y=23
Type=Comments
x=238
Connector2Conditional=True
properties_id=227
Connector0Output=True
VerifyExitValue=false
Connector3Conditional=True
filename=C\:\\armadillo2\\trunk\\armadillo\\data\\properties\\COMMENTS.properties
ObjectID=Informations_2108053754
defaultColor=ORANGE
Tooltip=This is a Comments added to the workflow.
Connector3Output=True
EditorClassName=editors.CommentsEditor
Connector2Output=True
Object=
Connector1Output=True
Description=\nThis workflow display on the screen some alignment\ninformations.
ObjectType=ScriptBig
Order=4

Object
#
#Wed Sep 21 17:09:57 EDT 2011
defaultColor=RED
Status=100
Repeat=true
StatusString=
Name=Muscle
ObjectID=Muscle_2108053756
Object=
ClassName=programs.muscle
colorMode=RED
Description=http\://www.drive5.com/muscle/
TimeRunning=984
properties_id=228
input_multiplesequences_id20=3
Executable=executable\\muscle\\muscle3.8.31_i86win32.exe
Order=3
output_alignment_id=53
Commandline_Running=cmd.exe /C executable\\muscle\\muscle3.8.31_i86win32.exe -in infile.fasta -out outfile.fasta -maxiters 2 
ExitValue=0
debug=true
Ntime=10
custom=true
output_outputtext_id=339
maxiters=2
default_maxiters=2
help=http\://www.drive5.com/muscle/muscle.html
Tooltip=Generate a multiple sequence alignment.
Connector1Conditional=True
filename=C\:\\armadillo2\\trunk\\armadillo\\data\\properties\\Muscle.properties
nbInput=1
EditorClassName=editors.MuscleEditor
Connector0Output=True
NoThread=true
input_multiplesequences_id10=1
y=326.0
x=431.0
InputMultipleSequences=Connector2
Type=Alignment
VerifyExitValue=true
OutputAlignment=Connector0
ObjectType=Program
OutputOutputText=Connector0
=0

Object
#
#Wed Sep 21 17:09:57 EDT 2011
HeuristicPosteriorAbs=true
heuristicPosteriorPropData=0.0
defaultColor=ORANGE
Status=100
StatusString=
Connector2=Rooted Tree
heuristicScenarioAbsData=5.0
Name=AncestorCC
OutputHTML=Connector0
ObjectID=AncestorCC_2108053757
heuristicScenarioPropData=0.0
heuristicPosteriorAbsData=5.0
Object=
InputAlignment=Connector3
ClassName=programs.ancestorcc
colorMode=ORANGE
Description=The computational inference of ancestral genomes consists of five difficult steps\: identifying syntenic regions, inferring ancestral arrangement of syntenic regions, aligning multiple sequences, reconstructing the insertion and deletion history and finally inferring substitutions. Each of these steps have received lot of attention in the past years. However, there currently exists no framework that integrates all of the different steps in an easy workflow. Here, we introduce Ancestors 1.0, a web server allowing one to easily and quickly perform the last three steps of the ancestral genome reconstruction procedure. It implements several alignment algorithms, an indel maximum likelihood solver and a context-dependent maximum likelihood substitution inference algorithm. The results presented by the server include the posterior probabilities for the last two steps of the ancestral genome reconstruction and the expected error rate of each ancestral base prediction. AVAILABILITY\: The Ancestors 1.0 is available at http\://ancestors.bioinfo.uqam.ca/ancestorWeb/.\n(C) Abdoulaye Banire Diallo.
HeuristicPosteriorProp=true
insertionExt=0.1
TimeRunning=6734
properties_id=229
input_alignment_id30=53
insertionStart=0.01
output_text_id=347
Executable=executable\\AncestorCC.exe
Order=12
output_results_id=346
output_alignment_id=54
Commandline_Running=cmd.exe /C executable\\sbInferSubstitutions.exe infile.seq infile.tre outfile.seq.anc outfile.seq outfile.seq.nucConf_CC outfile.seq.post_CC 
deletionExt=0.1
ExitValue=0
output_outputtext_id=349
OutputResults=Connector0
help=INPUT \:\nAncestor need a rooted binary phylogenetic tree.\nThe tree must include the branch length with no bootstrap \nvalues. The name of species must be identical to those \nin the multiple sequence alignment input. \nAn example of a correct tree is given in sample in the interface.\n\nINSERTION AND DELETION SCENARIO COMPUTATION PARAMETERS\:\nThe indel parameters option permits to indicate the algorithm to be run. \nSix algorithms have been implemented. \nThose algorithms are divided in two parts\:\n1 \=> The best scenarios\: permits to find the best indel scenario \nusing the viterbi algorithms. It gives the best 1-0 character \nassignments in the ancestor sequences.\n2 \=> The posterior decoding\: permit to compute the probability \nof having either 1 or 0 in each position of the ancestral \nsequences using the forward-backward algorithm.\n\n\nFor each part, it is possible to run either the exact \nalgorithm or the heuristic one\:\nExact algorithm \: it finds the solution by assessing \nall the possible paths. Due to the large number of \npaths, the speed can drastically be affected.\nHeuristic algorithm\: it permits the reduction of the \nnumber of paths using two approches. The first one \nreduces the number of analyzed paths by eliminating \nall the paths in a given alignment column that is out \nof the range given by the maximal value and maximal \nvalue added of an absolute likelihood value. The second \none keeps only a percentage of the best solutions. \nIt is worth noting that higher those values are, \nthey tend to correspond to exact solution.
deletionStart=0.01
Tooltip=Find ancestrale sequence and the probability associated.
Connector1Conditional=True
ancestral_filename=outfile.seq
filename=C\:\\armadillo2\\trunk\\armadillo\\data\\properties\\ANCESTORCC.properties
nbInput=2
EditorClassName=editors.AncestorCCEditor
Connector0Output=True
NoThread=true
y=400.0
x=808.0
exactScenario=true
HeuristicScenarioProp=true
input_tree_id20=12
HeuristicScenarioAbs=true
editorClass=editors.defaultWorkflowJDialog
output_html_id=345
Type=Ancestral Reconstruction
InputTree=Connector2
exactPosterior=true
VerifyExitValue=true
OutputAlignment=Connector0
ObjectType=Program
heuristicScenario=true
heuristicPosterior=true
OutputOutputText=Connector0

Object
#
#Wed Sep 21 17:09:57 EDT 2011
CommandLine=<InputAlignment
defaultColor=RED
Status=100
StatusString=
Name=fastDNAml
output_tree_id=11
ObjectID=fastDNAml_2108053758
Object=
InputAlignment=Connector2
ClassName=programs.fastdnaml
colorMode=RED
OutputUnknown=Connector0
Description=© Gary Olsen. University of Illinois, Urbana
TimeRunning=1219
properties_id=230
Executable=executable\\fastDNAml.exe
Order=8
output_results_id=340
Commandline_Running=cmd.exe /C executable\\fastDNAml.exe <infile>outfile 
ExitValue=0
debug=true
output_outputtext_id=342
OutputTree=Connector0
OutputResults=Connector0
help=Transition/transversion ratio \: This option can be used before a global or treefile option with auxiliary data.\\n\\nRandomize input order of sequences (jumble)\:Note that fastDNAml explores a very small number of alternative tree topologies relative to a typical parsimony program. There is a very real chance that the search procedure will not find the tree topology with the highest likelihood. Altering the order of taxon addition and comparing the trees found is a fairly efficient method for testing convergence. Typically, it would be nice to find the same best tree at least twice (if not three times), as opposed to simply performing some fixed number of jumbles and hoping that at least one of them will be the optimum.\n\nGlobal rearrangements \: The G (global) option has been generalized to permit crossing any number of branches during tree rearrangements. In addition, it is possible to modify the extent of rearrangement explored during the sequential addition phase of tree building.\nThe G U (global and user tree) option combination instructs the program to find the best of the user trees, and then look for rearrangements that are better still. If a rearrangement distance is specified, the input must contain a transition option.\nThe Global option can be used to force branch swapping on user trees, (combination of Global and User Tree(s) options).\n\nUser input Tree Options\: This options allows you to enter your own trees and instructs the program to evaluate them.\n\nUser tree - tree(s) file (Tree)\: The trees must be in Newick format, and terminated with a semicolon. (The program also accepts a pseudo_newick format, which is a valid prolog fact.)\nThe tree reader in this program is more powerful than that in PHYLIP 3.3. In particular, material enclosed in square brackets, [ like this ], is ignored as comments; taxa names can be wrapped in single quotation marks to support the inclusion of characters that would otherwise end the name (i.e., '(', ')', '\:', ';', '[', ']', ',' and ' '); names of internal nodes are properly ignored; and exponential notation (such as 1.0E-6) for branch lengths is supported.\n\nUser trees to be read with branch lengths \: Causes user trees to be read with branch lengths (and it is an error to omit any of them). Without the L option, branch lengths in user trees are not required, and are ignored if present.\n\nGenerates a re-sample of the input data (bootstrap)\: Tree files will be summarized in one '.tree' file as well as output files in one '.out' file\n\nRandom number seed for first bootstrap\: Warning\: For a given random number seed, the sample will always be the same.
Tooltip=Infer phylogenetic tree from DNA sequences using Maximum Likelyhood
Connector1Conditional=True
filename=C\:\\armadillo2\\trunk\\armadillo\\data\\properties\\fastDNAml.properties
nbInput=1
EditorClassName=editors.defaultEditor
Connector0Output=True
NoThread=true
input_alignment_id21=0
input_alignment_id20=53
y=87.0
x=710.0
Type=Tree
VerifyExitValue=true
ObjectType=Program
output_unknown_id=341
OutputOutputText=Connector0

Object
#
#Wed Sep 21 17:09:57 EDT 2011
OutputTree=True
Name=Tree
outputType=Tree
colorMode=GREEN
y=87.0
editorClass=editors.OutputEditor
x=907.0
properties_id=231
Status=404
ObjectID=Tree_2108053759
defaultColor=GREEN
Object=
Connector1Output=True
Description=fastDNAml (2011-09-21 17\:09\:11)_0
output_tree_id=11
ObjectType=Output
StatusString=No Class is set to run...
Order=9

Object
#
#Wed Sep 21 17:09:57 EDT 2011
OutputTree=True
Name=Tree
outputType=Tree
colorMode=GREEN
y=143.0
editorClass=editors.OutputEditor
x=1223.0
properties_id=232
Status=404
ObjectID=Tree_2108053760
defaultColor=GREEN
Object=
Connector1Output=True
Description=RootTree (using MidPoint) (2011-09-21 17\:09\:12)_0
output_tree_id=12
ObjectType=Output
StatusString=No Class is set to run...
Order=11

Object
#
#Wed Sep 21 17:09:57 EDT 2011
OutputOutputText=True
Name=OutputText
outputType=OutputText
colorMode=GREEN
y=420.0
editorClass=editors.OutputEditor
x=1005.0
ParentID=AncestorCC_1008112767
properties_id=233
Status=404
ObjectID=OutputText_2108053761
defaultColor=GREEN
output_outputtext_id=349
Object=
Connector1Output=True
Description=AncestorCC -software output (2011-09-21 17\:09\:21)
ObjectType=Output
StatusString=No Class is set to run...
Order=14

Object
#
#Wed Sep 21 17:09:57 EDT 2011
OutputHTML=True
Name=HTML
outputType=HTML
colorMode=GREEN
y=400.0
editorClass=editors.OutputEditor
x=1005.0
output_html_id=345
ParentID=AncestorCC_1008112767
properties_id=234
Status=404
ObjectID=HTML_2108053762
defaultColor=GREEN
Object=
Connector1Output=True
Description=AncestorCC results
ObjectType=Output
StatusString=No Class is set to run...
Order=15

Object
#
#Wed Sep 21 17:09:57 EDT 2011
Name=Alignment
outputType=Alignment
colorMode=GREEN
y=380.0
editorClass=editors.OutputEditor
OutputAlignment=True
x=1005.0
ParentID=AncestorCC_1008112767
properties_id=235
Status=404
ObjectID=Alignment_2108053763
defaultColor=GREEN
output_alignment_id=54
Object=
Connector1Output=True
Description=Ancestor from Muscle (2011-09-21 17\:09\:09)(2011-09-21 17\:09\:20)
ObjectType=Output
StatusString=No Class is set to run...
Order=16

Object
#
#Wed Sep 21 17:09:57 EDT 2011
Name=Results
outputType=Results
colorMode=GREEN
y=440.0
editorClass=editors.OutputEditor
x=1005.0
ParentID=AncestorCC_1008112767
output_results_id=346
properties_id=236
OutputResults=True
Status=404
ObjectID=Results_2108053764
defaultColor=GREEN
Object=
Connector1Output=True
Description=AncestorCC (2011-09-21 17\:09\:20)
ObjectType=Output
StatusString=No Class is set to run...
Order=13

Object
#
#Wed Sep 21 17:09:57 EDT 2011
InputText=True
defaultColor=BLUE
Status=100
InputCollection=True
StatusString=
Connector3=Name
Name=Output to Screen
InputFastaFile=True
ObjectID=Output to Screen_2108053765
InputUnrootedTree=True
InputAncestor=True
InputBlast=True
Object=
ClassName=programs.output_to_stdout
colorMode=BLUE
InputPosition=True
Description=Output the current data to the screen in text mode (stdout)
InputMultipleMatrix=True
TimeRunning=1316639361493
InternalArmadilloApplication=true
properties_id=237
InputTextFile=True
InputDatabase=True
InputPhylip_Distance=True
InputRootedTree=True
InputMultipleAlignment=True
Order=17
InputSequence=True
output_outputtext_id=350
InputAll=Connector2
WebServices=true
InputHTML=True
InputImageFile=True
InputUnknown=True
InputMultipleTrees=True
Connector1Conditional=True
filename=C\:\\armadillo2\\trunk\\armadillo\\data\\properties\\output_to_stdout.properties
nbInput=1
EditorClassName=editors.savefileEditor
Connector0Output=True
NoThread=false
input_alignment_id20=53
y=221.0
x=813.0
InputOutputText=True
InputMultipleUnknown=True
InputBlastDB=True
OutputOutputFile=Connector0
Type=Output
InputResults=True
InputPhylip_Seqboot=True
InputFile=True
InputBlastHit=True
ObjectType=Program
InputSOLIDFile=True
InputMultipleAlignments=True
InputSQLite3=True
InputMatrix=True
InputMultipleAncestor=True

Object
#
#Wed Sep 21 17:09:57 EDT 2011
OutputTree=Connector0
InputTree=Connector2
nbInput=1
OutputOutputText=Connector0
ClassName=programs.root_tree
Name=RootTree (using MidPoint)
colorMode=BLUE
NoThread=true
y=143.0
Type=Tree
x=1026.0
input_tree_id20=11
properties_id=238
ExitValue=0
Connector0Output=True
debug=true
Status=100
Commandline_Running=cmd.exe /C executable\\root_tree.exe intree >outtree 
VerifyExitValue=true
Executable=executable\\root_tree.exe
ObjectID=RootTree (using MidPoint)_2108053766
filename=C\:\\armadillo2\\trunk\\armadillo\\data\\properties\\root_tree.properties
defaultColor=BLUE
output_outputtext_id=343
EditorClassName=Not Set
TimeRunning=1031
Object=
output_tree_id=12
ObjectType=Program
StatusString=
Order=10

Object
#
#Wed Sep 21 17:09:57 EDT 2011
IfStatus=false
input_multiplesequences_id00=1
import=//--Armadillo import--//\nimport biologic.*;\nimport configuration.*;\nimport database.*;\nimport program.*;\nimport workflows.*;\n//--Java import--//\nimport java.io.*;\nimport java.net.*;\nimport java.util.*;\n
defaultColor=GREEN
Status=100
script=public static boolean g() {\n  return false;\n}
Connector2Conditional=true
StatusString=
Name=If
ObjectID=If_2108053767
output_multiplesequences_id=1
OutputOutputDatabase=true
Object=
ClassName=programs.IfProgramClass
colorMode=GREEN
TimeRunning=1316639345524
InternalArmadilloApplication=true
properties_id=239
Order=1
Commandline_Running=
InputAll=Connector0
OutputMultipleSequences=true
Connector1Conditional=true
filename=C\:\\armadillo2\\trunk\\armadillo\\data\\properties\\IF.properties
nbInput=0
EditorClassName=editors.IfEditor
NoThread=false
Connector2Output=True
Connector1Output=True
y=247
x=299
outputType=MultipleSequences
Type=Logical conditions
VerifyExitValue=false
className=Not Set
ObjectType=If
modeSide=True

Object
#
#Wed Sep 21 17:09:57 EDT 2011
Name=MultipleSequences
outputType=MultipleSequences
colorMode=GREEN
output_multiplesequences_id=1
y=217.0
x=78.0
properties_id=240
Status=404
ObjectID=MultipleSequences_2108053868
defaultColor=GREEN
Object=
Connector1Output=True
OutputMultipleSequences=True
Description=mtDNA (August 2010)
ObjectType=OutputDatabase
StatusString=No Class is set to run...
InputAll=Connector0
Order=0
=5

Object
#
#Wed Sep 21 17:09:57 EDT 2011
defaultColor=RED
Repeat=true
Name=Muscle
ObjectID=Muscle_2108053926
Object=
ClassName=programs.muscle
colorMode=RED
Description=http\://www.drive5.com/muscle/
TimeRunning=1284132496984
properties_id=241
input_multiplesequences_id20=1
Executable=executable\\muscle\\muscle3.8.31_i86win32.exe
Order=5
Commandline_Running=cmd.exe /C executable\\muscle\\muscle3.8.31_i86win32.exe -in infile.fasta -out outfile.fasta -maxiters 2            
ExitValue=0
debug=true
Ntime=10
custom=true
maxiters=2
default_maxiters=2
help=http\://www.drive5.com/muscle/muscle.html
Tooltip=Generate a multiple sequence alignment.
Connector1Conditional=True
filename=C\:\\armadillo2\\trunk\\armadillo\\data\\properties\\Muscle.properties
nbInput=1
EditorClassName=editors.MuscleEditor
Connector0Output=True
NoThread=true
y=129.0
x=372.0
InputMultipleSequences=Connector2
Type=Alignment
VerifyExitValue=true
OutputAlignment=Connector0
ObjectType=Program
OutputOutputText=Connector0
=0

Object
#
#Wed Sep 21 17:09:57 EDT 2011
Name=MultipleSequences
outputType=MultipleSequences
colorMode=GREEN
output_multiplesequences_id=3
y=373.0
x=96.0
properties_id=242
Status=404
ObjectID=MultipleSequences_2108053927
defaultColor=GREEN
Object=
Connector1Output=True
OutputMultipleSequences=True
Description=Generation of 10 DNA sequences of 100 bp
ObjectType=OutputDatabase
StatusString=No Class is set to run...
InputAll=Connector0
Order=2

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=0
Name=connector_2571
displayEdge=false
source=0
notDeletabled=true
dest_properties_id=225
source_properties_id=228

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=0
Name=connector_2572
displayEdge=false
source=1
notDeletabled=false
dest_properties_id=239
source_properties_id=240

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=2
Name=connector_2573
displayEdge=false
source=1
notDeletabled=false
dest_properties_id=228
source_properties_id=242

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=1
Name=connector_2574
displayEdge=false
source=2
notDeletabled=false
dest_properties_id=228
source_properties_id=239

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=0
Name=connector_2575
displayEdge=false
source=0
notDeletabled=true
dest_properties_id=226
source_properties_id=241

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=2
Name=connector_2576
displayEdge=false
source=1
notDeletabled=false
dest_properties_id=241
source_properties_id=239

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=2
Name=connector_2577
displayEdge=false
source=1
notDeletabled=false
dest_properties_id=237
source_properties_id=225

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=3
Name=connector_2578
displayEdge=false
source=1
notDeletabled=false
dest_properties_id=229
source_properties_id=225

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=2
Name=connector_2579
displayEdge=false
source=1
notDeletabled=false
dest_properties_id=230
source_properties_id=225

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=0
Name=connector_2580
displayEdge=false
source=0
notDeletabled=true
dest_properties_id=231
source_properties_id=230

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=2
Name=connector_2581
displayEdge=false
source=1
notDeletabled=false
dest_properties_id=238
source_properties_id=231

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=0
Name=connector_2582
displayEdge=false
source=0
notDeletabled=true
dest_properties_id=232
source_properties_id=238

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=2
Name=connector_2583
displayEdge=false
source=1
notDeletabled=false
dest_properties_id=229
source_properties_id=232

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=0
Name=connector_2584
displayEdge=false
source=0
notDeletabled=true
dest_properties_id=235
source_properties_id=229

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=0
Name=connector_2585
displayEdge=false
source=0
notDeletabled=true
dest_properties_id=234
source_properties_id=229

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=0
Name=connector_2586
displayEdge=false
source=0
notDeletabled=true
dest_properties_id=233
source_properties_id=229

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=0
Name=connector_2587
displayEdge=false
source=0
notDeletabled=true
dest_properties_id=236
source_properties_id=229

Connector
#
#Wed Sep 21 17:09:57 EDT 2011
destination=2
Name=connector_2588
displayEdge=false
source=1
notDeletabled=false
dest_properties_id=230
source_properties_id=226


