#!/bin/perl

use strict;
use warnings;

#=================================================================
#== Ne pas lancer plusieurs fois ce script
#=================================================================
my $nbProc = `ps x | grep launch_simulation.pl | wc -l`;
chomp($nbProc);
print STDOUT "Nombre de processus = $nbProc";
if($nbProc > 3){
	print STDOUT "Nombre de processus = $nbProc, on s'arrete";
	exit;
}

#================================================================
#== Constantes
#================================================================
use constant MAXTACHES => 210;
use constant NBNOEUDS  => 5;
use constant NBGENES   => 10;	

#================================================================
#== Variables
#================================================================
my @tab_nb_especes		= qw /8 16 32 64/;
my @tab_nb_hybrides		= (1..10);
my @tab_bootstrap		= (90,80,70);
my @tab_iterations		= (1..100);
#my %tab_walltime		= (8=>1500,16=>4000,32=>8000,64=>25000);
my %tab_walltime		= (8=>5000,16=>10000,32=>20000,64=>50000);
my %tab_replicats		= (8=>100,16=>100,32=>75,64=>50);
my $nb_replicats		= 1;
my $walltime			= 10;
my $repertoire			= "";
my $nom_tache			= "";
my $fichier_submit		= "";
my $fichier_archive		= "";
my $nb_taches_encore	= 0;
my $nb_taches_en_cours	= 0;
my $pourcentage			= 10;
my $nbGenes				= NBGENES;

#== Lecture du nombre de taches en cours
$nb_taches_en_cours = `/opt/moab/bin/showq -w user=alixboc | grep alixboc | wc -l`;
chomp($nb_taches_en_cours);
$nb_taches_encore	= MAXTACHES - $nb_taches_en_cours;

print STDOUT "\nNombre de taches en cours : $nb_taches_en_cours";
print STDOUT "\nNombre de taches possible encore : $nb_taches_encore";
				
#== Creation des differentes taches
foreach my $no_iteration (@tab_iterations){
	foreach my $boot (@tab_bootstrap){
		foreach my $nb_especes (@tab_nb_especes){
			$walltime = $tab_walltime{$nb_especes};
			$nb_replicats = $tab_replicats{$nb_especes};
			foreach my $nb_hybrides (@tab_nb_hybrides){	
				$repertoire = "simulation_$nb_especes" . "_$nb_hybrides" . "_$boot" . "_$no_iteration";
				
				#== verification du nombre de taches possible a envoyer encore
				if($nb_taches_encore <= 0){
					print STDOUT "\n\nLe nombre maximal de taches en cours est atteint ($nb_taches_en_cours), fin du programme\n\n";
					`/usr/bin/perl /home/alixboc/res.pl | sed 's/\\./,/g' > /home/alixboc/resultat.out`;
					exit;
				}
				
				if( !-e $repertoire){
					$nb_taches_encore --;
					
					$fichier_submit	= "submit_$nb_especes" . "_$nb_hybrides" . "_$boot" . "_$no_iteration.sh";
					$fichier_archive= "$repertoire.tar.gz";
					$nom_tache		= "s_$nb_especes" . "_$nb_hybrides" . "_$boot" . "_$no_iteration"; 
				
					print STDOUT "\n\n== Nouvelle taches ==\nrepertoire      = $repertoire\nfichier submit  = $fichier_submit\nnom de la tache = $nom_tache";


					#== Creation du repertoire
					&execution_system(1,"mkdir $repertoire");
					#== Synchronisation des donnees
					&execution_system(1,"rsync -avcq simulation/* $repertoire");
					#== Creation de l'archive
					&execution_system(1,"tar cvfz $fichier_archive $repertoire");
					#== suppression des fichiers
					&execution_system(1,"rm -f $repertoire/*");
					#== Deplacement de l'archive
					&execution_system(1,"mv $fichier_archive $repertoire/$fichier_archive");
		
					#== Creation du fichier de soumisson

					open OUT , ">$repertoire/$fichier_submit";

					print OUT "#!/bin/bash";
					print OUT "\n\n#PBS -N $nom_tache";						
					print OUT "\n#PBS -l walltime=$walltime";						
					print OUT "\n#PBS -A nnx-284-aa";						
					print OUT "\n#PBS -l nodes=1:ppn=8";						
					
					if (($no_iteration == 100) && ($nb_hybrides == 10) && ($boot == $tab_bootstrap[scalar(@tab_bootstrap)-1])){
						print OUT "\n#PBS -M dcarrey\@gmail.com";
						print OUT "\n#PBS -m bea";
					}
					else{
						print OUT "\n#PBS -M dcarrey\@gmail.com";
						print OUT "\n#PBS -m a";
					}
					print OUT "\n";						
					for(my $j=1;$j<=NBNOEUDS;$j++){
						print OUT "\nmkdir /\${RAMDISK}/$j";	
						print OUT "\ntar xfvz $fichier_archive -C /\${RAMDISK}/$j";
					}						
					print OUT "\n";						
					$pourcentage = 1;
					for(my $j=1;$j<=NBNOEUDS;$j++){
						print OUT "\ncd /\${RAMDISK}/$j/$repertoire";	
						print OUT "\n/usr/bin/perl simulation.pl $nb_especes $nb_hybrides $nb_replicats $pourcentage $boot $nbGenes &";
						#$pourcentage = ($pourcentage % 2) + 1;
						$pourcentage += 1;
					}						
					print OUT "\n\ncpt=0";						
					print OUT "\nwhile [ \"\$cpt\" -lt \"" . NBNOEUDS ."\" ]; do";						
					print OUT "\n\tsleep 60";	
					print OUT "\n\tcpt=0\n";
                    print OUT "\n\tfor ((j = 1; j <= " . NBNOEUDS . "; j += 1))";
                    print OUT "\n\tdo";
                    print OUT "\n\t\tfichier=\"/\${RAMDISK}/\${j}/$repertoire/resultat.res\"";
                    print OUT "\n\t\tif [ -f \"\$fichier\" ]; then";
                    print OUT "\n\t\t\tcpt=\$(( \$cpt + 1 ))";
                    print OUT "\n\t\tfi";
                    print OUT "\n\tdone";
                    print OUT "\ndone";				
#					print OUT "\nrsync -avc /\${RAMDISK}/1/$repertoire /home/alixboc/tata/";
					close OUT;

					#== Soumission de la tache
					&execution_system(1,"cd $repertoire; /opt/moab/bin/msub $fichier_submit");	
					
				}	
				else{
#					print STDOUT "\nLe repertoire [$repertoire] existe deja";
				}
			} 	
		}
	}
}

`/usr/bin/perl /home/alixboc/res.pl | sed 's/\\./,/g' > /home/alixboc/resultat.out`;
print STDOUT "\n\nFin normale du script $0, bonne journee ... \n";

sub execution_system {
	my ($opt,$cmd)  = @_;
	print STDOUT "\n>>$cmd" if ($opt == 1);
	return `$cmd`;
}
